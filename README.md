# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jkque/laravel-vue-component-maker.svg?style=flat-square)](https://packagist.org/packages/jkque/laravel-vue-component-maker)
[![Build Status](https://img.shields.io/travis/jkque/laravel-vue-component-maker/master.svg?style=flat-square)](https://travis-ci.org/jkque/laravel-vue-component-maker)
[![Quality Score](https://img.shields.io/scrutinizer/g/jkque/laravel-vue-component-maker.svg?style=flat-square)](https://scrutinizer-ci.com/g/jkque/laravel-vue-component-maker)
[![Total Downloads](https://img.shields.io/packagist/dt/jkque/laravel-vue-component-maker.svg?style=flat-square)](https://packagist.org/packages/jkque/laravel-vue-component-maker)

This package will create a vue component file for your laravel project.

Here's the output of the vue component:

``` js
<template>
    
</template>

<script>
export default {
    props: [],
    components : {

    },
    created(){

    },
    mounted() {

    },
    data(){
        return {
            greetings: 'Hello World'
        }
    },
    computed: {

    },
    watch: {

    },
    methods:{
        click(){

        }
    }

}
</script>

<style lang="scss">
    
</style>
```


## Installation

You can install the package via composer:

```bash
composer require jkque/laravel-vue-component-maker
```

Next, you must publish the config file:

```bash
php artisan vendor:publish --provider="Jkque\LaravelVueComponentMaker\LaravelVueComponentMakerServiceProvider"
```

This is the content of the published config file `vue-component.php`.

```php
return [
    /*
    * You can place your custom package configuration in here.
    * Path of your vue component
    */
    'path' => [
        resource_path().'/assets/js/components',
    ],
];
```

## Usage

Just run `php artisan make:vue-component ComponentName --path=path_inside_your_config_path(optional)` in your local project.
And thats it!

```php

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email johnkevin.cadungog@gmail.com instead of using the issue tracker.

## Credits

- [jkque](https://github.com/jkque)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).