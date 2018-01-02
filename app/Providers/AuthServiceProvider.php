<?php

namespace App\Providers;

use App\Consumer;
use App\NewsItem;
use App\Page;
use App\Permission;
use App\Policies\CategoryPolicy;
use App\Policies\CommentPolicy;
use App\Policies\ConsumerPolicy;
use App\Policies\NewsItemPolicy;
use App\Policies\PagePolicy;
use App\Policies\PermissionPolicy;
use App\Policies\ProfilePolicy;
use App\Policies\QueuePolicy;
use App\Policies\RequestorPolicy;
use App\Policies\RolePolicy;
use App\Policies\StatusPolicy;
use App\Policies\TagPolicy;
use App\Policies\TechnicianPolicy;
use App\Policies\TicketPolicy;
use App\Profile;
use App\Role;
use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Modules\SupportDesk\Models\Category;
use Modules\SupportDesk\Models\Comment;
use Modules\SupportDesk\Models\Queue;
use Modules\SupportDesk\Models\Requestor;
use Modules\SupportDesk\Models\Status;
use Modules\SupportDesk\Models\Tag;
use Modules\SupportDesk\Models\Technician;
use Modules\SupportDesk\Models\Ticket;

//use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Category::class => CategoryPolicy::class,
        Comment::class => CommentPolicy::class,
        Consumer::class => ConsumerPolicy::class,
        NewsItem::class => NewsItemPolicy::class,
        Page::class => PagePolicy::class,
        Permission::class => PermissionPolicy::class,
        Profile::class => ProfilePolicy::class,
        Queue::class => QueuePolicy::class,
        Requestor::class => RequestorPolicy::class,
        Role::class => RolePolicy::class,
        Status::class => StatusPolicy::class,
        Tag::class => TagPolicy::class,
        Technician::class => TechnicianPolicy::class,
        Ticket::class => TicketPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        Passport::tokensExpireIn(Carbon::now()->addDays(15));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
    }
}
