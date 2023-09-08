CREATE TABLE `form_incetive` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` bigint(20) unsigned NOT NULL,
  `incetive_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


select 
forms.id as form_id, forms.order as form_order, forms.description as form_description, forms.name as form_name, calls.id as call_id, 
calls.name as call_name, incentives.name as user_types_name, incentives.id as idusertypes
from forms
join form_incetive on form_incetive.form_id = forms.id
join incentives on incentives.id = form_incetive.incetive_id
join calls on calls.id = incentives.call_id
-- where calls.id = 90
                  