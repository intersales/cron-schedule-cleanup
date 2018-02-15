InterSales CronScheduleCleanup
===================
Cleanup the Magento2 cron_schedule Table

In Backend under System -> Configuration -> interSales Modules -> Cron Schedule Cleanup

Options:
- Activate
- Interval (hours) after which entries in the cron_schedule will be deleted ( Default: 24 )

The cron job runs every 6 hours.

Background
----------
Magento 2.2.x can, due to a bug, have performance issues when the cron_schedule table contains many entries. This module helps to work around that problem and at the same time keep this table lean and clean automatically.
More on this issue: https://www.splendid-internet.de/blog/cronjob-bug-in-magento-2-2-x-fuehrt-zu-hoher-cpu-auslastung/

Requirements
------------
- PHP >= 5.5.0

Installation
------------

### Via composer (recommended)

Please go to the Magento2 root directory and run the following commands in the shell:

```
composer config repositories.intersales_cron-schedule-cleanup vcs git@github.com:intersales/cron-schedule-cleanup.git
composer require magento2-modules/cron-schedule-cleanup
bin/magento module:enable InterSales_CronScheduleCleanup
bin/magento setup:upgrade
```

### Manually

Please create the directory *app/code/InterSales/CronScheduleCleanup* and copy the files from this repository to the created directory. Then run the following commands in the shell:

```
bin/magento module:enable InterSales_CronScheduleCleanup
bin/magento setup:upgrade
```


Support
-------
If you have any issues with this extension, open an issue on GitHub (see URL above)


Contribution
------------
Any contributions are highly appreciated. The best way to contribute code is to open a
[pull request on GitHub](https://help.github.com/articles/using-pull-requests).


Developer
---------
InterSales Team
* Website: [https://www.intersales.de](http://www.intersales.de)
* Twitter: [@intersales](https://twitter.com/intersales)


Copyright
---------
(c) 2018 interSales Team
