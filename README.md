<p align="center">
    <a href="https://sylius.com" target="_blank">
        <img src="https://demo.sylius.com/assets/shop/img/logo.png" />
    </a>
</p>

<h1 align="center">Seo page plugin for Sylius</h1>

## Installation
```bash
$ composer require ipanema/sylius-seo-page-plugin
```

Add plugin dependencies to your `config/bundles.php` file:
```php
return [
    ...

    Ipanema\SyliusSeoPagePlugin\IpanemaSyliusSeoPagePlugin::class => ['all' => true],
];
```
Import required config in your `config/packages/_sylius.yaml` file:

```yaml
# config/packages/_sylius.yaml

imports:
    ...
    
    - { resource: "@IpanemaSyliusSeoPagePlugin/Resources/config/config.yml" }
```

Create routing file ipanema_seo_page.yaml in your `config/routes` file:

```yaml

# config/routes/ipanema_seo_page.yaml
...

ipanema_sylius_seo_page_plugin:
  resource: "@IpanemaSyliusSeoPagePlugin/Resources/config/routing.yml"
```

Finish the installation by updating the database schema and installing assets:
```
$ bin/console doctrine:migrations:diff
$ bin/console doctrine:migrations:migrate or php bin/console doctrine:schema:update --force
```
## Use of Twig Extension

Create at first {% block metatags %}{% endblock %} in your layout.html.twig if not exist.

2 ways exist to get data: by code or by current route.

By code : Extension search record with same code (field Code on admin)

By route : Extension search record with same route (field Route on admin)

```twig
{% block metatags %}
    {# by code #}
    {% set seoPage = seo_page('home') %}
    {# by route #}
    {% set seoPage = seo_page_route(app.request.get('_route')) %}
    {% if seoPage %}
        {% if seoPage.metaKeywords is not empty %}
            <meta name="keywords" content="{{ seoPage.metaKeywords }}"/>
        {% endif %}
        {% if seoPage.metaDescription is not empty %}
            <meta name="description" content="{{ seoPage.metaDescription }}"/>
        {% endif %}
    {% endif %}
{% endblock %}
```
