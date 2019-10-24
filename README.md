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

Create at first {% block metatags %}{% endblock %} in your layout.html.twig if not exist

Twig Extension seo_page have one parameter => code of seo_page records

```twig
{% block metatags %}
    {% set seoPage = seo_page('home') %}
    {% if seoPage.metaKeywords is not empty %}
        <meta name="keywords" content="{{ seoPage.metaKeywords }}"/>
    {% endif %}
    {% if seoPage.metaDescription is not empty %}
        <meta name="description" content="{{ seoPage.metaDescription }}"/>
    {% endif %}
{% endblock %}
```
