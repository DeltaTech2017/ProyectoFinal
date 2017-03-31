CREATE TABLE Usuarios (
  idUsuarios INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Nombre VARCHAR  NOT NULL  ,
  Apellido VARCHAR  NOT NULL  ,
  Email VARCHAR  NOT NULL  ,
  Nombre_usuario VARCHAR  NOT NULL  ,
  Contraseña VARCHAR  NOT NULL    ,
PRIMARY KEY(idUsuarios)  ,
INDEX Nombre_usuario());



CREATE TABLE Producto (
  idProducto INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Producto VARCHAR  NULL  ,
  Precio DOUBLE  NULL  ,
  Color VARCHAR  NULL  ,
  Tamaño VARCHAR  NULL  ,
  Descirpcion TEXT  NULL    ,
PRIMARY KEY(idProducto));



CREATE TABLE Publicacion (
  idPublicacion INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Producto_idProducto INTEGER UNSIGNED  NOT NULL  ,
  Usuarios_idUsuarios INTEGER UNSIGNED  NOT NULL  ,
  idUsuarios INTEGER UNSIGNED  NOT NULL  ,
  idProducto INTEGER UNSIGNED  NOT NULL  ,
  Fecha DATE  NOT NULL    ,
PRIMARY KEY(idPublicacion, Producto_idProducto)  ,
INDEX Publicacion_FKIndex1(Usuarios_idUsuarios)  ,
INDEX Publicacion_FKIndex2(Producto_idProducto),
  FOREIGN KEY(Usuarios_idUsuarios)
    REFERENCES Usuarios(idUsuarios)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Producto_idProducto)
    REFERENCES Producto(idProducto)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE Factura (
  idFactura INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  Publicacion_Producto_idProducto INTEGER UNSIGNED  NOT NULL  ,
  Usuarios_idUsuarios INTEGER UNSIGNED  NOT NULL  ,
  Publicacion_idPublicacion INTEGER UNSIGNED  NOT NULL  ,
  idUsuarios INTEGER UNSIGNED  NULL  ,
  idPublicacion INTEGER UNSIGNED  NULL  ,
  Fecha DATE  NULL    ,
PRIMARY KEY(idFactura, Publicacion_Producto_idProducto, Usuarios_idUsuarios, Publicacion_idPublicacion)  ,
INDEX Factura_FKIndex1(Publicacion_idPublicacion, Publicacion_Producto_idProducto)  ,
INDEX Factura_FKIndex2(Usuarios_idUsuarios),
  FOREIGN KEY(Publicacion_idPublicacion, Publicacion_Producto_idProducto)
    REFERENCES Publicacion(idPublicacion, Producto_idProducto)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(Usuarios_idUsuarios)
    REFERENCES Usuarios(idUsuarios)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);




