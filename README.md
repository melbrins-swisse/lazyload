# HandH Lazyloading #
**version: 1.0.0**

### Description

This module will allow the product images to be lazyloaded as the user scroll through the pages. It will improve the generic page speed of the website by avoiding to download every ressource as soon as the user land on a page

### Admin Control

If for any reason we wish to remove the lazyload from the product images there is a setting in store / configuration to disabled the functionality. 

Go to Stores /  Configuration / HandH / Lazyload and update the field 'Enable lazy loading of product images?' to 'No'

### Implementation

The lazyload will be applied to all images which contains the class 'lazyload' and a data-src attribute as demonstrated below. 

The data:image/gif is optional but recommended so the image always have a source attribute and something is displayed by default before lazyload update the image with the correct url.

A JSON-LD has been added to the image template to retain all SEO value provided by the image

Images:
```
<img src="data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
     class="lazyload"
     loading="lazy"
     data-src="path/to/the/image"
     alt="" />
```

SEO JSON-LD:
```
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ImageObject",
        "image": "path/to/the/image",
        "name": "My image1",
        "description": "Long description"
    }
</script>
```




