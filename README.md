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

Create at first {% block metatags %}{% endblock %} in your layout.html.twig if not exist. Extension seo_page render html by default

```twig
{% block metatags %}
    {# by code #}
    {{ seo_page({'code': 'home'}) }}
    {# by route #}
    {{ seo_page({'route': app.request.get('_route')}) }}
    {# get only data record #}
    {{ seo_page({'route': app.request.get('_route'), 'data-only': true}) }}
    {# merge current data with default seo record (search by code ex: default) #}
    {{ seo_page({'route': app.request.get('_route')}, 'default': 'default') }}
{% endblock %}
```
