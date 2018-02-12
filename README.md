InterSales CronScheduleCleanup
===================
Cleanup the Magento2 cron_schedule Table

In Backend under System -> Configuration -> interSales Modules -> Cron Schedule Cleanup

Options:
- Activate
- Time set in h, after entries in the cron_schedule will deleted ( Default: 24 )

Every 6 hours the cron job runs.


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
