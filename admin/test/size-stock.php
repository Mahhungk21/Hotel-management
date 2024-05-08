<div class="form__size col-12">
    <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#size" aria-expanded="false" aria-controls="collapse-size">
        Các kích thước của sản phẩm
    </button>
    <div class="collapse" id="size">
        <div class="border border-1 rounded-2 px-1 py-2">
            <div class="d-flex flex-row flex-wrap">
                <?php
                $minSize = 24;
                $maxSize = 45;
                $i = 0;
                ?>
                <?php
                for ($i = $minSize; $i <= $maxSize; $i++) {
                ?>
                    <div class="form-check-inline m-3">
                        <input class="form-check-input" type="checkbox" name="<?= 'size' . $i ?>" value="TRUE" id="<?= 'size' . $i ?>">
                        <label class="form-check-label" for="<?= 'size' . $i ?>">
                            Size <?= $i ?>
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>