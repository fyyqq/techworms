

<div class="container-fluid mt-4">
    <h1 class="h3 text-dark"><?php echo esc_html(get_admin_page_title()); ?></h1>
    <div class="row mt-2 d-flex align-items-start justify-content-center flex-column">
        <div class="px-3 pt-4 pb-0 w-100">
            <form method="post" action="" class="px-4 pt-3 col-xl-7 col-12 rounded bg-light border">
                <table class="form-table">
                    <tr>
                        <th scope="row"><label for="form_icon">Icon</label></th>
                        <td>
                            <input type="text" id="form_icon" name="form_icon" value="<?php echo esc_attr($form["icon"]); ?>" class="regular-text">
                            <p class="description">Enter a Font Awesome icon class (e.g., fas fa-envelope)</p>
                            <a href="https://fontawesome.com/icons" target="_blank">https://fontawesome.com/icons</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="form_bg_color">Background Color</label></th>
                        <td><input type="color" id="form_bg_color" name="form_bg_color" value="<?php echo esc_attr($form["bg_color"]); ?>"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="form_font_color">Font Color</label></th>
                        <td><input type="color" id="form_font_color" name="form_font_color" value="<?php echo esc_attr($form["font_color"]); ?>"></td>
                    </tr>
                </table>
                <div class="d-flex align-items-center justify-content-between w-100">
                    <?php submit_button('Save Changes', 'primary', 'form_setup_submit'); ?>
                    <?php
                        if (isset($_POST['form_setup_submit'])) {
                            update_option('form_icon', sanitize_text_field($_POST['form_icon']));
                            update_option('form_bg_color', sanitize_hex_color($_POST['form_bg_color']));
                            update_option('form_font_color', sanitize_hex_color($_POST['form_font_color']));
                            echo '
                            <div class="updated d-flex justify-content-start align-items-center">
                                <p class="my-0 py-1">Saved.</p>
                            </div>';
                        }
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>