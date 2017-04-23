@extends('layouts.master')

@section('title')
    Update InvoicePlane
@endsection

@section('content')

    <h2 class="page-title">Update InvoicePlane</h2>

    <div class="alert alert-warning">
        Before you start: <b>Make a backup of your database and all files!</b> There will be no support if you missed to make a backup and lost any data.
    </div>

    <ol>
        <li>Make a backup of your database and all files! This is very important to prevent any data loss.</li>
        <li>Download the latest version from <a href="https://invoiceplane.com/downloads" class="ext">InvoicePlane.com</a>.</li>
        <li>Copy all files to the root directory of your InvoicePlane installation but <b>do not</b> overwrite the following files:
            <ul>
                <li>The <code>/ipconfig.php</code> file</li>
                <li>Customized templates in <code>/application/views/</code></li>
            </ul>
        </li>
        <li>Open <code>http://yourdomain.com/index.php/setup</code> and follow the instructions. The app will run all updates onit's own.</li>
        <li>Login again and check if everything is working.</li>
    </ol>

    <hr>

    <h3 id="upgrade-from-previous">
        Upgrade to InvoicePlane 1.5.0 from a previous version <?php IP::headlineLink('/en/1.5/getting-started/updating-ip#upgrade-from-previous'); ?>
    </h3>

    <p>Version 1.5.0 comes with some changes that require your attention. Be very careful and keep in mind to make a backup before you start. Make sure to read all instructions completely as we do not support any broken installations because you didn't followed this guid.</p>

    <div class="alert alert-warning">Please follow the next steps <b>before</b> running the update / setup!</div>

    <h4 id="upgrade-general">
        General Upgrade <?php IP::headlineLink('/en/1.5/getting-started/updating-ip#upgrade-general'); ?>
    </h4>

    <ol>
        <li>First of all, make a backup of your current installation in another folder you can easily access in the next steps.</li>
        <li>Then, delete everything in your InvoicePlane folder. <b>Everything</b>. You have a backup, so don't worry. This is very important as many old files are now deprecated and may lead to problems if you keep them.</li>
        <li>Now, copy the contents of the 1.5.0 package into the InvoicePlane folder.</li>
        <li>We will migrate some of your configuration to the new files now. All actions will take place in your InvoicePlane folder.
            <ul>
                <li>Make a copy of the <code>ipconfig.php.example</code> file and rename the copy to <code>ipconfig.php</code>.</li>
                <li>Open the old <code>index.php</code> file and copy your URL from the top of the file.</li>
                <li>Open the <code>ipconfig.php</code> file and paste the URL into the <code>IP_URL</code> setting like this: <code>IP_URL=http://your-domain.com</code>.</li>
                <li>Open the old <code>application/config/database.php</code> file and copy your database credentials to a text file or note them somewhere else.</li>
                <li>Set these database credentials in the <code>ipconfig.php</code> file. The database host goes into the <code>DB_HOSTNAME</code> setting like this: <code>DB_HOSTNAME=localhost</code>. All other database settings are set like this. The database port may not be set, so manually change it to <code>DB_PORT=3306</code>.</li>
            </ul>
            <p class="alert alert-warning">Make sure you follow he instructions in the <code>ipconfig.php</code> file if you use a subdomain or a subfolder to run InvoicePlane.</p>
        </li>
        <li>After the configuration is migrated, copy the contents of your old <code>uploads/</code> folder into the new one.</li>
        <li>You can now run the setup by opening <code>IP_URL=http://your-domain.com/index.php/setup</code> in your browser. The setup will then upgrade the database, migrate the custom fields and set a new encription key for you.</li>
    </ol>

    <p>Please notice: if you used custom templates or modified other files, take a look at the following section.</p>


    <h4 id="other-changes">
        Other notable changes <?php IP::headlineLink('/en/1.5/getting-started/updating-ip#other-changes'); ?>
    </h4>

    <p>The following changes may not affect all users as they address specific parts of the application.</p>

    <ul>
        <li>Custom fields were overhauled and are now stored in an entirely other way than before. The setup will convert all existing custom fields. However, double-check if all fields were correctly migrated and if all values are still present. If not, report this bug to the community forums with as much information as possible.</li>
        <li>If you used the merchant settings for online payments before, you have to enter all credentials again as they can't be migrated automatically.
            <br>You can now select from a list of online payment providers. See the <a href="/en/1.5/settings/online-payments">Online Payment</a> page for more information.</li>
        <li>The variable <code>$show-discounts</code> was renamed to <code>$show-item-discounts</code> for PDF templates. If you use the variable, please update it. Please review the <a href="/en/1.5/templates/customize-templates">Customize Templates</a> page for more information about the variables.</li>
        <li>The files for custom CSS (`custom.css` and `custom-pdf.css`) moved to the `assets/core/css` folder. Make sure you transfer your custom styles to these files.</li>
        <li>If you modified any mPDF settings or added custom fonts, you have to copy these changes to the new location of mPDF which is now stored in this directory:
            <br><code>/vendor/mpdf/mpdf</code></li>
    </ul>

    <div class="alert alert-info">
        <?php echo trans('global.footernotice') ?>
    </div>

    <?php
    $article_pagination = array(
            'previous' => array(
                    'url' => '/en/1.5/getting-started/quickstart',
                    'title' => 'Quickstart',
                    'type' => 'article'
            ),
            'next' => array(
                    'url' => '/en/1.5/modules/',
                    'title' => 'Modules',
                    'type' => 'section'
            )
    );
    ?>

@stop