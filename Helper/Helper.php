<?php
/**
 * Created by PhpStorm.
 * User: db
 * Date: 09-Feb-18
 * Time: 12:56
 */

namespace InterSales\CronScheduleCleanup\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Helper extends  AbstractHelper
{
    /**
     *
     * @var section id on system.xml file.
     */
    private $configSectionId = 'cron_schedule_cleanup';

    /**
     * Return TRUE if Cronjob Cleanup module is able or FALSE if is disable.
     *
     * @return bool
     */
    public function isJobCleanupActive()
    {
        return $this->scopeConfig->getValue($this->configSectionId . '/general/active');
    }

    /**
     * Get time to cleanup.
     *
     * @return integer
     */
    public function getTimeCleanUp()
    {
        return  $this->scopeConfig->getValue($this->configSectionId . '/general/hours');

    }

}