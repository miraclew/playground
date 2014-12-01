<?php
/**
 * Created by PhpStorm.
 * User: aaaa
 * Date: 14/11/29
 * Time: 下午5:36
 */
use Pheanstalk\Pheanstalk;

class VdlController extends BaseController
{

    public function getIndex() {
        return View::make('vdl/index', array('name' => 'Taylor'));
    }

    public function postJob()
    {
        $jobUrl = Input::get("url");

        echo $jobUrl;
        $this->addJobQueue($jobUrl);
    }

    private function addJobQueue($jobUrl)
    {
    }

} 