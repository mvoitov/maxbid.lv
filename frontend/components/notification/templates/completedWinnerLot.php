<?php

/**
 *
 * @author Ivan Teleshun <teleshun.ivan@gmail.com>
 * @link http://molotoksoftware.com/
 * @copyright 2016 MolotokSoftware
 * @license GNU General Public License, version 3
 */

/**
 *
 * This file is part of MolotokSoftware.
 *
 * MolotokSoftware is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * MolotokSoftware is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with MolotokSoftware.  If not, see <http://www.gnu.org/licenses/>.
 */

?>
    Sold lots. Bidding for your item <?= $linkItem; ?> completed.<br/>
    <br/>
<?php if ($lotModel->status == Auction::ST_COMPLETED_SALE): ?>
    <strong>Last bet: </strong> <?= $bidPrice; ?> EUR.<br/>
<?php elseif ($lotModel->status == Auction::ST_SOLD_BLITZ || $quantity > 1): ?>
    <strong>Bought at a blitz price:</strong> <?= $lotModel->price; ?> EUR.<br/>
    Amount: <?= $quantity; ?><br/>
    Total amount: <?= $amount; ?> EUR.<br/>
<?php else: ?>
    <?php if (isset($lotModel->price)): ?>
        <strong>Bought at a blitz price:</strong> <?= $lotModel->price; ?> EUR.<br/>
        <br/>
    <?php endif; ?>
<?php endif; ?>
    <br/>
    <strong>Contact details:</strong><br/>
    Buyer: <?= $buyerModel->getLink(); ?><br/>
<?php if (!empty($buyerModel->telephone)): ?>
    Phone: <?= $buyerModel->telephone; ?><br/>
<?php endif; ?>
    E-mail: <?= $buyerModel->email; ?><br/>
    Additional contact information: <?= $buyerModel->add_contact_info; ?><br/>
<?php
echo CHtml::link('Go to sold lots', Yii::app()->createAbsoluteUrl('/user/sales/soldItems'));
