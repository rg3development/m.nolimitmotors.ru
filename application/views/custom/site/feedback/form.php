<span class="error">
    <?= validation_errors(); ?>
</span>

<? if($fb_form->id == 10) : ?>
    <div class="forma spacer">
        <form id="contact_<?= $fb_form->id; ?>" action="" method="post">
            <? foreach ( $fb_fields as $key => $field ) : ?>
                <? $field_name = "fname_{$fb_form->id}_{$key}"; ?>
                <? if ( $field->type == 4 ) : ?>
                    <textarea name="<?= $field_name; ?>" placeholder="<?= $field->title; ?>"><?= set_value($field_name); ?></textarea>
                    <br>
                <? elseif ( $field->type == 5 ) : ?>
                    <input type = 'hidden' value = '' name = '<?= $field_name; ?>'>
                    <? $cur_fields = explode(',', $field->selector_val); ?>
                    <div class="select_box">
                        <div class="select_drop_down">
                            <div class="select_value" id = '<?= $field_name; ?>'><?=$cur_fields[0];?></div>
                                <ul class="select_list">
                                    <? array_shift($cur_fields); ?>
                                    <? foreach ( $cur_fields as $key => $value ) : ?>
                                        <li class="select_item" value="<?= $value; ?>"><?= $value; ?></li>
                                    <? endforeach; ?>
                                </ul>
                        </div>
                    </div>
                <? else: ?>
                    <input type="text" class="text_input" name="<?= $field_name; ?>" placeholder="<?= $field->title; ?>" value='<?= set_value($field_name); ?>'>
                    <br>
                <? endif; ?>
            <? endforeach; ?>
            <p class="yellow note">Поля, помеченные * (звездочкой) - обязательны для заполнения.</p>
            <input class="yellow_btn btn" id = 'submitTo' type="submit" title="Отправить заявку" value="Отправить заявку"/>
        </form>
    </div>
<? elseif($fb_form->id == 7) : ?>
    <div class="forma spacer">
        <h2><?=$fb_form->title;?></h2>
        <form id="contact_<?= $fb_form->id; ?>" action="" method="post">
            <? foreach ( $fb_fields as $key => $field ) : ?>
                <? $field_name = "fname_{$fb_form->id}_{$key}"; ?>
                <? if ( $field->type == 4 ) : ?>
                    <textarea name="<?= $field_name; ?>" class="textarea_input" placeholder="<?= $field->title; ?>"><?= set_value($field_name); ?></textarea>
                    <br>
                <? elseif ( $field->type == 5 ) : ?>
                    <input type = 'hidden' value = '' name = '<?= $field_name; ?>'>
                    <? $cur_fields = explode(',', $field->selector_val); ?>
                    <div class="select_box">
                        <div class="select_drop_down">
                            <div class="select_value" id = '<?= $field_name; ?>'><?=$cur_fields[0];?></div>
                                <ul class="select_list">
                                    <? array_shift($cur_fields); ?>
                                    <? foreach ( $cur_fields as $key => $value ) : ?>
                                        <li class="select_item" value="<?= $value; ?>"><?= $value; ?></li>
                                    <? endforeach; ?>
                                </ul>
                        </div>
                    </div>
                <? else: ?>
                    <input type="text" class="text_input" name="<?= $field_name; ?>" placeholder="<?= $field->title; ?>" value='<?= set_value($field_name); ?>'>
                    <br>
                <? endif; ?>
            <? endforeach; ?>
            <input class="yellow_btn btn" id = 'submitContacts' type="submit" title="Отправить заявку" value="Отправить письмо"/>
            <p class="yellow note">Пожалуйста, используйте реальные контакты для отправки письма. Поля, помеченные * (звездочкой) - обязательны для заполнения. </p>
        </form>
    </div>
<? else : ?>
    <div class="forma spacer">
        <form id="contact_<?= $fb_form->id; ?>" action="" method="post">
            <? foreach ( $fb_fields as $key => $field ) : ?>
                <? $field_name = "fname_{$fb_form->id}_{$key}"; ?>
                <? if ( $field->type == 4 ) : ?>
                    <textarea name="<?= $field_name; ?>" placeholder="<?= $field->title; ?>"><?= set_value($field_name); ?></textarea>
                    <br>
                <? elseif ( $field->type == 5 ) : ?>
                    <input type = 'hidden' value = '' name = '<?= $field_name; ?>'>
                    <? $cur_fields = explode(',', $field->selector_val); ?>
                    <div class="select_box">
                        <div class="select_drop_down">
                            <div class="select_value" id = '<?= $field_name; ?>'><?=$cur_fields[0];?></div>
                                <ul class="select_list">
                                    <? array_shift($cur_fields); ?>
                                    <? foreach ( $cur_fields as $key => $value ) : ?>
                                        <li class="select_item" value="<?= $value; ?>"><?= $value; ?></li>
                                    <? endforeach; ?>
                                </ul>
                        </div>
                    </div>
                <? else: ?>
                    <input type="text" class="text_input" name="<?= $field_name; ?>" placeholder="<?= $field->title; ?>" value='<?= set_value($field_name); ?>'>
                    <br>
                <? endif; ?>
            <? endforeach; ?>
            <p class="yellow note">Поля, помеченные * (звездочкой) - обязательны для заполнения.</p>
            <input class="yellow_btn btn" id = 'submitTest' type="submit" title="Отправить заявку" value="Отправить заявку"/>
        </form>
    </div>
<? endif; ?>
