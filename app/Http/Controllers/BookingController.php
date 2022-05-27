<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\BookingDetail;
use Illuminate\Http\Request;
use stdClass;

class BookingController extends Controller
{
    public function __constract()
    {
        //
    }

    /**
     * @OA\Get(
     *      path="/api/bookings",
     *      operationId="getBookingsList",
     *      tags={"Bookings"},
     *      summary="Get list of bookings",
     *      description="Returns list of bookings",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     *
     * Returns list of bookings
     */
    public function index()
    {
        $data = Booking::all();
        return response()->json($data);
    }

    /**
     * @OA\Post(
     *      path="/api/bookings",
     *      operationId="postBookingsStore",
     *      tags={"Bookings"},
     *      summary="Booking",
     *      description="Returns status, mess, booking_id",
     *      @OA\Parameter(
     *            name="stylist_id",
     *            description="Stylist ID",
     *            example=1,
     *            required=true,
     *            in="path",
     *            @OA\Schema(
     *                type="integer"
     *            )
     *        ),
     *      @OA\Parameter(
     *            name="user_id",
     *            description="Customer ID",
     *            example=1,
     *            required=true,
     *            in="path",
     *            @OA\Schema(
     *                type="integer"
     *            )
     *        ),
     *      @OA\Parameter(
     *            name="store_id",
     *            description="Store ID",
     *            example=1,
     *            required=true,
     *            in="path",
     *            @OA\Schema(
     *                type="integer"
     *            )
     *        ),
     *      @OA\Parameter(
     *            name="promotion_id",
     *            description="Promotion ID, Default 1",
     *            example="2 or null",
     *            required=false,
     *            in="path",
     *            @OA\Schema(
     *                type="integer"
     *            )
     *        ),
     *      @OA\Parameter(
     *            name="service_id_list[]",
     *            description="List Service ID",
     *            example="1,2,3,4,5",
     *            required=true,
     *            in="path",
     *            @OA\Schema(
     *              type="array",
     *              @OA\Items(type="integer")
     *          )
     *        ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     */
    public function store(Request $request)
    {
        if ($request->promotion_id == null) {
            $request->promotion_id = 1;
        }

        $res = new stdClass();

        $add = Booking::create($request->all());

        if ($add) {
            foreach ($request->service_id_list as $v) {
                BookingDetail::create([
                    'booking_id' => $add->id,
                    'service_id' => $v,
                    'price' => BookingDetail::find($v)->price,
                ]);
            }

            $add->update([
                'total' => $add->total(),
            ]);

            $res->status = 'success';
            $res->mess = 'Đặt lịch thành công.';
            $res->booking_id = $add->id;
        } else {
            $res->status = 'faild';
            $res->mess = 'Đặt lịch thất bại.';
        }

        return response()->json($res);
    }
    /**
     * @OA\Get(
     *      path="/api/bookings/{id}",
     *      operationId="showDetailBooking",
     *      tags={"Bookings"},
     *      summary="Booking Detail",
     *      description="Returns detail booking",
     *      @OA\Parameter(
     *            name="id",
     *            description="Booking ID",
     *            example=1,
     *            required=true,
     *            in="path",
     *            @OA\Schema(
     *                type="integer"
     *            )
     *        ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        $data = Booking::find($id);

        $data->stylist_name = $booking->stylist->name;
        $data->customer_name = $booking->customer->name;
        $data->store_name = $booking->store->name;
        $data->promotion = $booking->promotion;

        return response()->json($data);
    }

    /**
     * @OA\Get(
     *      path="/api/bookings/{id}/cancel",
     *      operationId="cancelBooking",
     *      tags={"Bookings"},
     *      summary="cancel Booking",
     *      description="",
     *      @OA\Parameter(
     *            name="id",
     *            description="Booking ID",
     *            example=1,
     *            required=true,
     *            in="path",
     *            @OA\Schema(
     *                type="integer"
     *            )
     *        ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"api_key_security_example": {}}
     *       }
     *     )
     */
    public function cancelBooking($id)
    {
        $booking = Booking::find($id);

        $res = new stdClass;

        if ($booking->status == BookingStatus::Pending) {
            $booking->status = BookingStatus::Canceled;
            $booking->save();

            $res->status = "success";
            $res->mess = "Đã hủy!";
        } else {
            $res->status = "faild";
            $res->mess = "Không thể hủy!";
        }

        return response()->json($res);
    }
}
