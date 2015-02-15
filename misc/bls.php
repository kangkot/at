<?php

_get_apiuser_data($uid, 'field_name');

$subscription_reference = bella_subscription_get_legacy_sub_ref($profile_id, $country);
$subscription = bella_subscription_load_by_reference($subscription_reference)
$app_user = bella_subscription_get_subscription_appuser($subscription);
$api_profile = profile2_load_by_user($app_user->uid, 'main');

# $from = $from_user_profile_wrapper->field_intercom_admin_id->value();
# $to = $app_user->field_email['und'][0]['value'];
# $to = "AU-" . $app_user_wrapper->field_external_id->value();
