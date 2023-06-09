<?php
namespace App\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Liman\Toolkit\Shell\Command;

class HomeController
{
    public function index()
    {
		$mail = "test@gmail.com";

		return view('test', [
			"mail"  => $mail
		]);
    }

	public function  mail(){
		$mail = request('mail');

		$data =  Command::runSudo('sh /liman/monitoring/monitoring.sh');

//        $res = Mail::to($mail)->send($data);

		return respond($data, 200);
	}
}