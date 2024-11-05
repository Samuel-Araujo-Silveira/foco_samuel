<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use SimpleXMLElement;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Reserve;
use App\Models\Guest;
use App\Models\Daily;
use App\Models\Payment;

class XmlController extends Controller
{
    public function readXml()
    {
        // Paths to XML files
        $hotelsPath = storage_path('app/xml/hotels.xml');
        $roomsPath = storage_path('app/xml/rooms.xml');
        $reservesPath = storage_path('app/xml/reserves.xml');

        // Process Hotels XML
        if (File::exists($hotelsPath)) {
            $xml = new SimpleXMLElement(File::get($hotelsPath));
            foreach ($xml->Hotel as $hotel) {
                Hotel::updateOrCreate(
                    ['id' => (int) $hotel['id']],
                    ['name' => (string) $hotel->Name]
                );
            }
        }

        // Process Rooms XML
        if (File::exists($roomsPath)) {
            $xml = new SimpleXMLElement(File::get($roomsPath));
            foreach ($xml->Room as $room) {
                Room::updateOrCreate(
                    ['id' => (int) $room['id']],
                    [
                        'hotel_id' => (int) $room['hotelCode'],
                        'name' => (string) $room->Name
                    ]
                );
            }
        }

        // Process Reserves XML
        if (File::exists($reservesPath)) {
            $xml = new SimpleXMLElement(File::get($reservesPath));
            foreach ($xml->Reserve as $reserve) {
                $reserveRecord = Reserve::updateOrCreate(
                    ['id' => (int) $reserve['id']],
                    [
                        'hotel_id' => (int) $reserve['hotelCode'],
                        'room_id' => (int) $reserve['roomCode'],
                        'check_in' => (string) $reserve->CheckIn,
                        'check_out' => (string) $reserve->CheckOut,
                        'total' => (float) $reserve->Total,
                    ]
                );

                if (isset($reserve->Guests->Guest)) {
                    foreach ($reserve->Guests->Guest as $guest) {
                        Guest::create([
                            'reserve_id' => $reserveRecord->id,
                            'name' => (string) $guest->Name,
                            'last_name' => (string) $guest->LastName,
                            'phone' => (string) $guest->Phone,
                        ]);
                    }
                }

                if (isset($reserve->Dailies->Daily)) {
                    foreach ($reserve->Dailies->Daily as $daily) {
                        Daily::create([
                            'reserve_id' => $reserveRecord->id,
                            'date' => (string) $daily->Date,
                            'value' => (float) $daily->Value,
                        ]);
                    }
                }

                if (isset($reserve->Payments->Payment)) {
                    foreach ($reserve->Payments->Payment as $payment) {
                        Payment::create([
                            'reserve_id' => $reserveRecord->id,
                            'method' => (int) $payment->Method,
                            'value' => (float) $payment->Value,
                        ]);
                    }
                }
            }
        }

        return true;
    }
}
