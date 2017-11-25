<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\ActionLog
 *
 * @property int $id
 * @property int $user_id
 * @property string $route
 * @property string $method
 * @property string $action
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActionLog whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActionLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActionLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActionLog whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActionLog whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActionLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ActionLog whereUserId($value)
 */
	class ActionLog extends \Eloquent {}
}

namespace App{
/**
 * App\Consumer
 *
 * @property string $id
 * @property string|null $api_token
 * @property string $name
 * @property string $url
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereUrl($value)
 */
	class Consumer extends \Eloquent {}
}

namespace Modules\SupportDesk\Models{
/**
 * Modules\SupportDesk\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\SupportDesk\Models\Ticket[] $tickets
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Category onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Category withoutTrashed()
 */
	class Category extends \Eloquent {}
}

namespace Modules\SupportDesk\Models{
/**
 * Modules\SupportDesk\Models\Comment
 *
 * @property int $id
 * @property int $ticket_id
 * @property int $user_id
 * @property string $comment
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @property-read \Modules\SupportDesk\Models\Ticket $ticket
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Comment onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Comment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Comment whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Comment whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Comment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Comment withoutTrashed()
 */
	class Comment extends \Eloquent {}
}

namespace Modules\SupportDesk\Models{
/**
 * Modules\SupportDesk\Models\Ticket
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $ticket_id
 * @property string $title
 * @property string $priority
 * @property string $message
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Modules\SupportDesk\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\SupportDesk\Models\Comment[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @property-read \App\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Ticket onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Ticket whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Ticket whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Ticket whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Ticket wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Ticket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Ticket whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Ticket whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\SupportDesk\Models\Ticket whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Ticket withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Modules\SupportDesk\Models\Ticket withoutTrashed()
 */
	class Ticket extends \Eloquent {}
}

namespace Modules\SystemMonitoring\Models{
/**
 * Modules\SystemMonitoring\Models\SystemMonitoring
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 */
	class SystemMonitoring extends \Eloquent {}
}

namespace Modules\VendorPanel\Models{
/**
 * Modules\VendorPanel\Models\VendorPanel
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 */
	class VendorPanel extends \Eloquent {}
}

namespace App{
/**
 * App\NewsItem
 *
 * @property int $id
 * @property string $title
 * @property string $summary
 * @property string $link
 * @property string $author
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsItem whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsItem whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsItem whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NewsItem whereUpdatedAt($value)
 */
	class NewsItem extends \Eloquent {}
}

namespace App{
/**
 * App\NullComment
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 */
	class NullComment extends \Eloquent {}
}

namespace App{
/**
 * App\NullProfile
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 */
	class NullProfile extends \Eloquent {}
}

namespace App{
/**
 * App\NullTicket
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 */
	class NullTicket extends \Eloquent {}
}

namespace App{
/**
 * App\NullUser
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string|null $domain
 * @property string $slug
 * @property string|null $stripe_id
 * @property string|null $card_brand
 * @property string|null $card_last_four
 * @property string|null $trial_ends_at
 * @property int $is_logged_in
 * @property int $is_disabled
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $phone_country_code
 * @property string|null $phone_number
 * @property string|null $two_factor_options
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\NullComment[] $comments
 * @property-read \App\NullProfile $profile
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\NullTicket[] $tickets
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereCardBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereCardLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereIsDisabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereIsLoggedIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser wherePhoneCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereTwoFactorOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\NullUser whereUsername($value)
 */
	class NullUser extends \Eloquent {}
}

namespace App{
/**
 * App\Permission.
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission sortable($defaultSortColumn = null, $direction = 'asc')
 */
	class Permission extends \Eloquent {}
}

namespace App{
/**
 * App\Profile
 *
 * @property int $id
 * @property int $user_id
 * @property string $username
 * @property string|null $biography
 * @property string $address_1
 * @property string|null $address_2
 * @property string $city
 * @property string $state
 * @property string $country
 * @property int $postal_code
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Profile onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereBiography($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Profile whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Profile withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Profile withoutTrashed()
 */
	class Profile extends \Eloquent {}
}

namespace App{
/**
 * App\Role.
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Permission[] $perms
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role sortable($defaultSortColumn = null, $direction = 'asc')
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string|null $domain
 * @property string $slug
 * @property string|null $stripe_id
 * @property string|null $card_brand
 * @property string|null $card_last_four
 * @property string|null $trial_ends_at
 * @property bool $is_logged_in
 * @property bool $is_disabled
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $phone_country_code
 * @property string|null $phone_number
 * @property string|null $two_factor_options
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\SupportDesk\Models\Comment[] $comments
 * @property-read string $gravatar
 * @property-read bool $using_two_factor_auth
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Profile $profile
 * @property-read \Illuminate\Database\Eloquent\Collection|\Venturecraft\Revisionable\Revision[] $revisionHistory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Cashier\Subscription[] $subscriptions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\SupportDesk\Models\Ticket[] $tickets
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User filter(\DCAS\Filters\QueryFilter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User findSimilarSlugs($attribute, $config, $slug)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\User onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User search($search, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User searchRestricted($search, $restriction, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCardBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCardLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsDisabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsLoggedIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhoneCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereTwoFactorOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\User withoutTrashed()
 */
	class User extends \Eloquent {}
}

