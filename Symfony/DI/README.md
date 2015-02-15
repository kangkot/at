#### Basic structure

```yaml
parameters:
  foo: FOO

services:
  # Service that needs arguments & calls
  restler.factory:
    class": "AndyTruong\\App\\Helper\\Factory\\RestlerFactory"
    arguments: ["%restler.class_name%"]
    calls:
      [ setCacheDirectory, ["%app.dir%/files/cache"] ]
      [ addResources,      ["%restler.resources%"] ]
      [ setFormats,        ["%restler.formats%"] ]
      [ setTemplateDir",   ["%restler.template_dir%"] ]
  # Service that needs factory
  restler:
    class: Luracast\Restler\Restler
    factory_service: restler.factory
    factory_method: getRestler
```
