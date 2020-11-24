# Notas y recomendaciones

## Crear un modelo

    php artisan make:model Nombre  
    
## Crear un controlador

    php artisan make:controller NombreController -r   

## Crear un modelo con su controlador relacionado 

    php artisan make:model Nombre -cr   

## Política de nombres 
> La política de nombres sique el estandear de nombres de clases (para las clases)  
> Eso significa Mayúscula y singular
>
> Pasa lo mismo con otros nombres?   
> Si, por ejemplo: Laravel asume que si el modelo se llama  
> Marca, la tabla se llamará marcas (usando el sistema básico de plurales con s).

    protected $table = 'regiones';      
    protected $primaryKey = 'regID';   
    public $timestamps = false;   
    
    