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
//        $this->addJobQueue($jobUrl);
    }

    private function addJobQueue($jobUrl)
    {
        $pheanstalk = new Pheanstalk('127.0.0.1');

        // producer (queues jobs)
        $pheanstalk
            ->useTube('testtube')
            ->put("job payload goes here\n");

        // worker (performs jobs)
        $job = $pheanstalk
            ->watch('testtube')
            ->ignore('default')
            ->reserve();

        echo $job->getData();

        $pheanstalk->delete($job);

        // check server availability
        $pheanstalk->getConnection()->isServiceListening(); // true or false
    }


} 