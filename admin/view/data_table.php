<div class="container-fluid mt-4">
    <h1 class="h3 text-dark "><?php echo esc_html(get_admin_page_title()); ?></h1>
    <div class="row mt-3">
        <div class="col-xl-8 col-12">
            <table class="wp-list-table widefat fixed striped" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($visitors as $index => $visitor) : ?>
                        <tr>
                            <td><?php echo $index += 1; ?></td>
                            <td><?php echo esc_html($visitor["first_name"]); ?></td>
                            <td><?php echo esc_html($visitor['last_name']); ?></td>
                            <td><?php echo esc_html($visitor['email_address']); ?></td>
                            <td><?php echo esc_html($visitor['created_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="d-flex align-items-center justify-content-end mt-3">
                <p class="text-dark" style="font-size: 16px;">Total Visitor: <?php echo count($visitors); ?></p>
            </div>
        </div>
    </div>
</div>
