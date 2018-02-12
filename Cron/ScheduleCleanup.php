<?php
/**
 * Created by PhpStorm.
 * User: db
 * Date: 2/7/2018
 * Time: 3:29 PM
 */

namespace InterSales\CronScheduleCleanup\Cron;

use InterSales\CronScheduleCleanup\Helper\Helper;
use \Psr\Log\LoggerInterface;
use \Magento\Cron\Model\Schedule;
use \DateTime;

class ScheduleCleanup
{
    protected $logger;

    protected $helper;

    /** @var \Magento\Cron\Model\Schedule */
    protected $schedule;

   /**
     * ScheduleCleanup constructor.
     * @param LoggerInterface $logger
     * @param Schedule $schedule
     * @param Helper $helper
     */
    public function __construct(
        LoggerInterface $logger,
        Schedule $schedule,
        Helper $helper
    )
    {
        $this->schedule = $schedule;
        $this->helper = $helper;
        $this->logger = $logger;
    }

    /**
     * Delete entries that was executed more than X hours.
     * X is the value of field 'Time to cleanUp CronSchedule table in hours' in backend setup or the value 24 will be use as default if the field is empty.
     *
     * @return void
     */

    public function execute() {
        if($this->helper->isJobCleanupActive())
        {

            $timeCleanup = $this->helper->getTimeCleanUp();
            if(empty($timeCleanup))
            {
                //The default value will be 24 if the 'Time to cleanUp CronSchedule table in hours' field is empty.
                $timeCleanup = 24;
            }
            $dateCleanup = new DateTime();
            $dateCleanup->modify('-' .  $timeCleanup . ' hours');

            $cronSchedules = $this->schedule->getResourceCollection()
                ->addFieldToSelect('*')
                ->addFieldToFilter('executed_at', [ 'lt' => $dateCleanup]);

            //$this->logger->info('ScheduleCleanup - SQL: ' . $cronSchedules->getSelectSql());
            $totalCronSchedules = count($cronSchedules);

            foreach ($cronSchedules as $cronSchedule)
            {
                $cronSchedule->delete();
            }

            $this->logger->info('ScheduleCleanup - Cron: ' . $totalCronSchedules . ' entries was deleted.');
        }
    }
}