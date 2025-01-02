<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyjournalController;
use App\Http\Controllers\MyreportsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
    // return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
	Route::any('/test',[DashboardController::class, 'test'])->name('test');
	Route::any('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
	Route::get('/myjournal',[MyjournalController::class, 'index']);
	Route::any('/addmyjournal',[MyjournalController::class, 'addmyjournal']);
	Route::any('/getentries',[MyjournalController::class, 'getentries']);
	Route::any('/deleteentry',[MyjournalController::class, 'deleteentry']);
	Route::any('/editentry',[MyjournalController::class, 'editentry']);
	Route::any('/updateentry',[MyjournalController::class, 'updateentry']);
	Route::get('/myeqreport',[MyreportsController::class, 'eqreports']);
	Route::any('/getreportcontent',[MyreportsController::class, 'getreportcontent']);
	Route::any('/getcpreportcontent',[MyreportsController::class, 'getcpreportcontent']);
	Route::any('/getsdreportcontent',[MyreportsController::class, 'getsdreportcontent']);
	Route::any('/gettdreportcontent',[MyreportsController::class, 'gettdreportcontent']);
	Route::any('/getreportpdffile',[MyreportsController::class, 'getreportpdffile']);
	Route::any('/exploreeq',[MyreportsController::class, 'exploreeq']);
	Route::any('/careerexplorer',[MyreportsController::class, 'careerexplorer']);
	Route::any('/watchvideoseq',[MyreportsController::class, 'watchvideoseq']);
	Route::any('/externalresourceseq',[MyreportsController::class, 'externalresourceseq']);
	Route::any('/externalresourcescp',[MyreportsController::class, 'externalresourcescp']);
	Route::get('/careerpath',[MyreportsController::class, 'careerpath'])->name('careerpath');
	Route::get('/socialdynamics',[MyreportsController::class, 'socialdynamics'])->name('socialdynamics');
	Route::get('/typediscovery',[MyreportsController::class, 'typediscovery'])->name('typediscovery');
	Route::any('/careerexplorer',[DashboardController::class, 'careerexplorer'])->name('careerexplorer');
	Route::post('/searchcareer',[DashboardController::class, 'searchcareer'])->name('searchcareer');
});

require __DIR__.'/auth.php';
