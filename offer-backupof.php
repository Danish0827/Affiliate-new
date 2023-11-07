<select name="advrname" class="form-select" id="statusSelect" disabled>

    <?php
    foreach ($withoutCompanyData as $key => $off) {
        if ($off['id'] == $Offer['advertiser_name']) { ?>
            <option value="(<?= $off['id'] ?>) <?= $off['advertiser_name'] ?>" selected>
                <p>(<?= $off['id'] ?>)</p>&nbsp;&nbsp;&nbsp;&nbsp;
                <p><?= $off['advertiser_name'] ?></p>
            </option>

        <?php } else {
        ?>
            <option value="(<?= $off['id'] ?>) <?= $off['advertiser_name'] ?>">
                <p>(<?= $off['id'] ?>)</p>&nbsp;&nbsp;&nbsp;&nbsp;
                <p><?= $off['advertiser_name'] ?></p>
            </option>
    <?php
        }
    }
    ?>
</select>