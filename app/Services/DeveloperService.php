<?php namespace App\Services;

use App\Repositories\DeveloperRepository;

class DeveloperService extends Service{

    public function __construct(DeveloperRepository $r) {
		parent::__construct($r);
	}
}