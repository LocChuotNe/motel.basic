<?php
if (isset($data) && is_array($data) && count($data)) {
    foreach ($data as $key => $value) {
?>
        <?php
        $explode = explode('mp4', $value['image']);
        ?>
        <li class="ui-state-default select_img__update_banner select_img__update_<?php echo $key ?>">
            <div class="wrap-select-slide">
                <div class="thumb">
                    <span class="image img-scaledown">
                        <?php if (isset($explode) && is_array($explode) && count($explode) > 1) { ?>
                            <video>
                                <source src="<?php echo $value['image'] ?>" type="video/mp4">
                            </video>
                        <?php } else { ?>
                            <img src="<?php echo $value['image'] ?>" alt="">
                        <?php } ?>
                        <input type="hidden" value="<?php echo $value['image'] ?>" class="value-img-banner" name="album[]">
                    </span>
                    <div class="overlay"></div>
                    <div class="delete-image"><i class="fa fa-trash" aria-hidden="true"></i></div>
                </div>
                <div class="data-slide-panel ">
                    <div class="form-group form-item-va">
                        <label class="col-xs-4 control-label" for="attachment-details-two-column-alt-text" class="name">Văn bản thay thế</label>
                        <div class="col-xs-8">
                            <input type="text" id="attachment-details-two-column-alt-text" value="<?php echo $value['alt'] ?>" name="alt[]" placeholder="Văn bản thay thế" class="form-control form_font_weght">
                        </div>
                    </div>
                    <div class="form-group form-item-va">
                        <label class="col-xs-4 control-label" for="attachment-details-two-column-title">Tiêu đề</label>
                        <div class="col-xs-8">
                            <input type="text" id="attachment-details-two-column-title" placeholder="Tiêu đề..." value="<?php echo $value['title'] ?>" name="title[]" class="form-control form_font_weght">
                        </div>
                    </div>
                    <div class="form-group form-item-va">
                        <label class="col-xs-4 control-label" for="attachment-details-two-column-canonical">Đường dẫn</label>
                        <div class="col-xs-8">
                            <input type="text" id="attachment-details-two-column-canonical" placeholder="Đường dẫn..." value="<?php echo $value['canonical'] ?>" name="canonical[]" class="form-control form_font_weght">
                        </div>
                    </div>
                    <div class="form-group form-item-va">
                        <label class="col-xs-4 control-label" for="attachment-details-two-column-description">Mô tả</label>
                        <div class="col-xs-8">
                            <textarea id="attachment-details-two-column-description" placeholder="Mô tả..." name="description[]" class="form-control form_font_weght"><?php echo $value['description'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group form-item-va">
                        <label class="col-xs-4 control-label" for="attachment-details-two-column-caption">Nội dung</label>
                        <div class="col-xs-8">
                            <textarea id="attachment-details-two-column-caption" placeholder="Nội dung" name="content[]" class="form-control form_font_weght"><?php echo $value['content'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </li>

<?php }
} ?>