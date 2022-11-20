<?php

namespace App\Http\Controllers;

use App\Models\Qrcode;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode as SimpleQrCode;

class QrcodeController extends Controller
{
    public function index()
    {
        $qrcodes = Qrcode::paginate(10);
        return view('dashboard', compact('qrcodes'));
    }

    public function generate(Request $request)
    {
        $validated = $request->validate(['name' => 'nullable', 'data' => 'required']);
        $qrcode = Qrcode::create($validated);
        // $qrImage = SimpleQrCode::format('png')->generate($request->data);
        return back()->with('message', 'Created Successfully');
    }

    public function download($id)
    {
        $qrcode = Qrcode::findOrFail($id);
        $filename =  ($qrcode->name ?? 'qr-image' ). '.png';
        $qrImage = SimpleQrCode::size(500)->format('png')->generate($qrcode->data);
        return \response()->streamDownload(function () use ($qrImage) {
            echo $qrImage;
        }, $filename);
    }

    public function remove($id)
    {
        $qrcode = Qrcode::findOrFail($id);
        $qrcode->delete();
        return back();
    }
}
