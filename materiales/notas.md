# Notas y recomendaciones

## Crear un modelo

    php artisan make:model Nombre  
    
## Crear un controlador

    php artisan make:controller NombreController -r   

## Crear un modelo con su controlador relacionado 

    php artisan make:model Nombre -cr   

## Política de nombres 
> La política de nombres sique el estandar de nombres de clases (para las clases)  
> Eso significa Mayúscula y singular para el nombre de los Models
>
> Pasa lo mismo con otros nombres?   
> Si, por ejemplo: cuando usamos Eloquent, (Laravel) asume que si el modelo se llama  
> Marca, la tabla se llamará marcas (usando el sistema básico de plurales con s).    
> También Eloquent asume que el primary key se llama 'id'   

    protected $table = 'regiones';      
    protected $primaryKey = 'regID';    
    
> Finalmente Eloquent asume que todas las tablas tienen los campos:     
> 'updated_at' y 'created_at'. Podemos configurar que no tenemos dichos campos.    

    public $timestamps = false;  

