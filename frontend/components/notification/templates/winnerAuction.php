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

    Purchase history. Congratulations. You won the auction by lot <?= $linkItem; ?>. Please contact the seller and redeem the lot.<br/>
<?php if ($quantity>1): ?>
    Cost: <?= $lotPrice; ?>. <br/>
    Amount: <?=$quantity; ?><br/>
    Total amount: <?=$amount;?><br/>
<?php else: ?>
    Cost: <?= $lotPrice; ?>. <br/>
<?php endif; ?>
<br/>
<strong>Contact details:</strong><br/>
    Seller: <?= $sellerModel->getLink(); ?><br/>
<?php if (!empty($sellerModel->telephone)): ?>
    Phone: <?=$sellerModel->telephone; ?><br/>
<?php endif; ?>
E-mail: <?= $sellerModel->email; ?><br/>
    Additional contact information: <?= $sellerModel->add_contact_info; ?><br/>
<?php echo CHtml::link('Go to shopping', Yii::app()->createAbsoluteUrl('/user/shopping/historyShopping'));
