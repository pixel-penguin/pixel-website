# Pixel Penguin Package Demo

Add the following lines  in autoload-deve in your main composer.json

```
"PixelPenguin\\Demo\\": "pixelpenguin/demo/src/"
```

It should look like this:

```
 "autoload-dev": {
        "psr-4": {
            "PixelPenguin\\PixelPenguinDemo\\": "pixelpenguin/demo/src/"
        }
    },
 ```
  
  After this is done, do a composer dump-autoload:
  
  ```
  composer dump-autoload
  ```

Under config/app.php add the following under Providers

```
PixelPenguin\PixelPenguinDemo\PixelPenguinDemoServiceProvider::class,
```

Edit the composer.json file as required
