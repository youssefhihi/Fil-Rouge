<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function index(Reservation $reservation)
    {
        $data = [
            'title' => 'Ticket for book',
            'date' => date('y/m/d'),
            'reservation' => $reservation,
        ];

        $pdf = Pdf::loadView('client.reservationPDF', $data);
        return $pdf->download('generate-reservation-pdf.pdf');
    }
}
