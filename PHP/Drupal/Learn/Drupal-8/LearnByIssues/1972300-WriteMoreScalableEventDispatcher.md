Issue: https://www.drupal.org/node/1972300

At #1972300:7671335, chx raised issue that Event dispatcher is slowly created, it requires create all subscribers. This is really bad for Drupal

```php
<?php
    protected function getEventDispatcherService()
    {
        $this->services['event_dispatcher'] = $instance = new \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher($this);
        $instance->addSubscriberService('config.factory', 'Drupal\\Core\\Config\\ConfigFactory');
        $instance->addSubscriberService('router.route_provider', 'Drupal\\Core\\Routing\\RouteProvider');
        $instance->addSubscriberService('router.route_preloader', 'Drupal\\Core\\Routing\\RoutePreloader');
        $instance->addSubscriberService('router.path_roots_subscriber', 'Drupal\\Core\\EventSubscriber\\PathRootsSubscriber');
        $instance->addSubscriberService('router.rebuild_subscriber', 'Drupal\\Core\\EventSubscriber\\RouterRebuildSubscriber');
        $instance->addSubscriberService('menu.rebuild_subscriber', 'Drupal\\Core\\EventSubscriber\\MenuRouterRebuildSubscriber');
        $instance->addSubscriberService('paramconverter_subscriber', 'Drupal\\Core\\EventSubscriber\\ParamConverterSubscriber');
        $instance->addSubscriberService('route_subscriber.module', 'Drupal\\Core\\EventSubscriber\\ModuleRouteSubscriber');
        $instance->addSubscriberService('route_subscriber.entity', 'Drupal\\Core\\EventSubscriber\\EntityRouteAlterSubscriber');
        $instance->addSubscriberService('ajax_subscriber', 'Drupal\\Core\\EventSubscriber\\AjaxSubscriber');
        $instance->addSubscriberService('route_enhancer.param_conversion', 'Drupal\\Core\\Routing\\Enhancer\\ParamConversionEnhancer');
        $instance->addSubscriberService('route_content_controller_subscriber', 'Drupal\\Core\\EventSubscriber\\ContentControllerSubscriber');
        $instance->addSubscriberService('route_content_form_controller_subscriber', 'Drupal\\Core\\EventSubscriber\\ContentFormControllerSubscriber');
        $instance->addSubscriberService('route_special_attributes_subscriber', 'Drupal\\Core\\EventSubscriber\\SpecialAttributesRouteSubscriber');
        $instance->addSubscriberService('route_http_method_subscriber', 'Drupal\\Core\\EventSubscriber\\RouteMethodSubscriber');
        $instance->addSubscriberService('router_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\RouterListener');
        $instance->addSubscriberService('view_subscriber', 'Drupal\\Core\\EventSubscriber\\ViewSubscriber');
        $instance->addSubscriberService('html_view_subscriber', 'Drupal\\Core\\EventSubscriber\\HtmlViewSubscriber');
        $instance->addSubscriberService('access_route_subscriber', 'Drupal\\Core\\EventSubscriber\\AccessRouteSubscriber');
        $instance->addSubscriberService('maintenance_mode_subscriber', 'Drupal\\Core\\EventSubscriber\\MaintenanceModeSubscriber');
        $instance->addSubscriberService('path_subscriber', 'Drupal\\Core\\EventSubscriber\\PathSubscriber');
        $instance->addSubscriberService('finish_response_subscriber', 'Drupal\\Core\\EventSubscriber\\FinishResponseSubscriber');
        $instance->addSubscriberService('redirect_response_subscriber', 'Drupal\\Core\\EventSubscriber\\RedirectResponseSubscriber');
        $instance->addSubscriberService('request_close_subscriber', 'Drupal\\Core\\EventSubscriber\\RequestCloseSubscriber');
        $instance->addSubscriberService('config_import_subscriber', 'Drupal\\Core\\EventSubscriber\\ConfigImportSubscriber');
        $instance->addSubscriberService('config_snapshot_subscriber', 'Drupal\\Core\\EventSubscriber\\ConfigSnapshotSubscriber');
        $instance->addSubscriberService('exception.default_json', 'Drupal\\Core\\EventSubscriber\\ExceptionJsonSubscriber');
        $instance->addSubscriberService('exception.default_html', 'Drupal\\Core\\EventSubscriber\\DefaultExceptionHtmlSubscriber');
        $instance->addSubscriberService('exception.default', 'Drupal\\Core\\EventSubscriber\\DefaultExceptionSubscriber');
        $instance->addSubscriberService('exception.logger', 'Drupal\\Core\\EventSubscriber\\ExceptionLoggingSubscriber');
        $instance->addSubscriberService('exception.custom_page_json', 'Drupal\\Core\\EventSubscriber\\ExceptionJsonSubscriber');
        $instance->addSubscriberService('exception.custom_page_html', 'Drupal\\Core\\EventSubscriber\\CustomPageExceptionHtmlSubscriber');
        $instance->addSubscriberService('exception.fast_404_html', 'Drupal\\Core\\EventSubscriber\\Fast404ExceptionHtmlSubscriber');
        $instance->addSubscriberService('exception.test_site', 'Drupal\\Core\\EventSubscriber\\ExceptionTestSiteSubscriber');
        $instance->addSubscriberService('kernel_destruct_subscriber', 'Drupal\\Core\\EventSubscriber\\KernelDestructionSubscriber');
        $instance->addSubscriberService('ajax.subscriber', 'Drupal\\Core\\Ajax\\AjaxSubscriber');
        $instance->addSubscriberService('replica_database_ignore__subscriber', 'Drupal\\Core\\EventSubscriber\\ReplicaDatabaseIgnoreSubscriber');
        $instance->addSubscriberService('authentication_subscriber', 'Drupal\\Core\\EventSubscriber\\AuthenticationSubscriber');
        $instance->addSubscriberService('block.current_user_context', 'Drupal\\block\\EventSubscriber\\CurrentUserContext');
        $instance->addSubscriberService('block.current_language_context', 'Drupal\\block\\EventSubscriber\\CurrentLanguageContext');
        $instance->addSubscriberService('block.node_route_context', 'Drupal\\block\\EventSubscriber\\NodeRouteContext');
        $instance->addSubscriberService('field_ui.subscriber', 'Drupal\\field_ui\\Routing\\RouteSubscriber');
        $instance->addSubscriberService('node.route_subscriber', 'Drupal\\node\\Routing\\RouteSubscriber');
        $instance->addSubscriberService('node.admin_path.route_subscriber', 'Drupal\\node\\EventSubscriber\\NodeAdminRouteSubscriber');
        $instance->addSubscriberService('system.admin_path.route_subscriber', 'Drupal\\system\\EventSubscriber\\AdminRouteSubscriber');
        $instance->addSubscriberService('system.config_subscriber', 'Drupal\\system\\SystemConfigSubscriber');
        $instance->addSubscriberService('system.automatic_cron', 'Drupal\\system\\EventSubscriber\\AutomaticCron');
        $instance->addSubscriberService('user_maintenance_mode_subscriber', 'Drupal\\user\\EventSubscriber\\MaintenanceModeSubscriber');
        return $instance;
    }
?>
```

### Resolution

Add new [ContainerAwareEventDispatcher](https://github.com/drupal/drupal/blob/8.0.x/core/lib/Drupal/Component/EventDispatcher/ContainerAwareEventDispatcher.php), accepts list of listeners, which are compiled via a CompilerPass…
