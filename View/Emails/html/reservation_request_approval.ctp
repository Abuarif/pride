<html>
    <body>
        <table width="200" border="0" cellpadding="0" cellspacing="0" style="border-width:1px;border-style:solid;border-left-color:#D6D7D7;border-right-color:#D6D7D7;border-top-color:#D6D7D7;border-bottom-color:#D6D7D7;border-radius:10px;">
        <tr>
            <td>
                <img src="http://ams-staging.pride.com.my/ams-dev/uploads/emailBanner3.png" width="760" height="181" style="border-radius:10px;"/>
            </td>
        </tr>
        <tr>
            <td align="right">
                <table width="700" border="0" cellspacing="0" cellpadding="0" style="font-family:Verdana, Geneva, sans-serif;font-size:small;">
                  <tr>
                    <td>Dear Sir,<br /><br /></td>
                  </tr>
                  <tr>
                    <td><br />Please take action on the following:</td>
                  </tr>
                </table>
                <br /><br />
                <table width="700" border="0" cellpadding="0" cellspacing="0" style="border-width:1px; font-family:Verdana, Geneva, sans-serif;font-size:small;">
                  <tr>
                    <td style="text-align:left;width:130px;height:30px;vertical-align:text-top;">Activity</td>
                    <td style="text-align:center;width:30px;height:30px;vertical-align:text-top;">:</td>
                    <td style="text-align:left;height:30px;vertical-align:text-top;"><?php echo $user['email']['activity']; ?></td>
                  </tr>
                  <tr>
                    <td style="text-align:left;height:30px;vertical-align:text-top;">Advertiser</td>
                    <td style="text-align:center;width:30px;height:30px;vertical-align:text-top;">:</td>
                    <td style="text-align:left;height:30px;vertical-align:text-top;"><?php echo $user['email']['advertiser']; ?></td>
                  </tr>
                  <!-- <tr>
                    <td style="text-align:left;height:30px;vertical-align:text-top;">Campaign</td>
                    <td style="text-align:center;width:30px;height:30px;vertical-align:text-top;">:</td>
                    <td style="text-align:left;height:30px;vertical-align:text-top;"><?php //echo $user['email']['campaignName']; ?></td>
                  </tr> -->
                  <tr>
                    <td style="text-align:left;height:30px;vertical-align:text-top;">Submission Date</td>
                    <td style="text-align:center;width:30px;vertical-align:text-top;height:30px;">:</td>
                    <td style="text-align:left;height:30px;vertical-align:text-top;"><?php echo $user['email']['submissionDate']; ?></td>
                  </tr>
                </table>
                <br />
                <table width="90%" border="0" cellpadding="0" cellspacing="0" align="center" style="font-family:Verdana, Geneva, sans-serif;font-size:small;">
                  <tr>
                    <td align="center">
                        <br /><br />Please login this link in order to view the activity details:
                    </td>
                  </tr>
                  <tr>
                    <td align="center">
                    <?php
                        $url = Router::url(array(
                            'plugin' => 'pride',
                            'controller' => 'reservations',
                            'action' => 'view', $user['email']['reservation_id']
                        ), true);
                        echo __d('croogo', '%s', $url);
                    ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="center">
                        <br />Thank you for your cooperation on the matter. 
                    </td>
                  </tr>
                  <tr>
                    <td align="center">
                        -- This is an automated system notification -- <br /><br />
                    </td>
                  </tr>
                </table>
            </td>
        </tr>
        </table>
    </body>
</html>
