<?php
/**
 * @package    falcon
 * @author     Hryvinskyi Volodymyr <volodymyr@hryvinskyi.com>
 * @copyright  Copyright (c) 2018. Hryvinskyi Volodymyr
 * @version    0.0.1-alpha.0.1
 */

namespace falcon\config\observer;


use falcon\core\event\ObserverInterface;
use yii\base\Event;

class AfterSave implements ObserverInterface
{
    public function execute(Event $observer)
    {
        var_dump(get_class($observer));
        exit('observer');
    }
}