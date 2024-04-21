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

        $pdf = Pdf::loadView('pdf.generate-reservation-pdf', $data);
        return $pdf->download('client.reservartionPDF.pdf');
    }
}
