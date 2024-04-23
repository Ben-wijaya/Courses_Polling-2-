<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Polling;
use App\Models\PollingDetail;
use App\Models\Prodis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MhsPollingController extends Controller
{
    public function index() {
        $currentDate = Carbon::now(); // Get current server time
        $polls = Polling::all(); // Get all polling data

        // Update polling status based on end date
        foreach ($polls as $poll) {
            $pollEndDate = Carbon::parse($poll->end_date);
            if ($currentDate->greaterThan($pollEndDate)) {
                // Jika tanggal saat ini lebih besar dari tanggal akhir polling, set polling_status ke 0 (polling sudah berakhir)
                if ($poll->status_polling != 1) { // Jika belum diatur sebagai berakhir
                    $poll->status_polling = 1; // Status polling sudah berakhir
                    $poll->save(); // Save perubahan status
                }
            }
        }

        return view('dashboard.mhs_polling.index', [
            'users' => User::all(),
            'matkuls' => MataKuliah::all(),
            'prodis' => Prodis::all(),
            'polls' => $polls,
            'poll_detail' => PollingDetail::all(),
        ]);
    }

    public function edit($polling)
    {
        return view('dashboard.mhs_polling.polling', [
            'users' => User::all(),
            'prodis' => Prodis::all(),
            'matkuls' => MataKuliah::all(),
            'polls' => $polling,
        ]);
    }

    public function create($pollId)
    {
        // Temukan polling berdasarkan ID yang diterima dari rute
        $poll = Polling::find($pollId);

        // Pastikan polling dengan ID ini ada
        if (!$poll) {
            return redirect('/dashboard/mhs_polling')->with('error', 'Polling tidak ditemukan');
        }

        // Kembalikan tampilan dengan data polling dan data lainnya jika diperlukan
        return view('dashboard.mhs_polling.polling', [
            'poll' => $poll, // data polling
            'matkuls' => MataKuliah::all(), // semua mata kuliah
            'prodis' => Prodis::all(), // semua prodi
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'polling_id' => 'required',
        ]);

        // Loop melalui data mata kuliah yang dipilih dari formulir
        foreach ($request->mata_kuliah as $mk) {
            // Simpan data ke dalam database menggunakan model
            PollingDetail::create([
                'polling_id' => $validatedData['polling_id'], // Tambahkan polling_id ke dalam detail
                'users_id' => auth()->user()->id,
                'mata_kuliah_id' => $mk // Sesuaikan dengan nama kolom di tabel Anda
                // Tambahkan kolom lain jika diperlukan
            ]);
        }

        // Redirect atau tampilkan pesan sukses jika diperlukan
        return redirect('/dashboard/mhs_polling')->with('success', 'Polling berhasil ditambahkan!');
    }

}
