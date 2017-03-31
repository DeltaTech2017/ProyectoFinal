CREATE TABLE Usuarios (
  idUsuarios INTEGER  NOT NULL   IDENTITY ,
  Nombre VARCHAR  NOT NULL  ,
  Apellido VARCHAR  NOT NULL  ,
  Email VARCHAR  NOT NULL  ,
  Nombre_usuario VARCHAR  NOT NULL  ,
  Contraseña VARCHAR  NOT NULL    ,
PRIMARY KEY(idUsuarios)  );
GO


CREATE INDEX Nombre_usuario ON Usuarios ();
GO




CREATE TABLE Producto (
  idProducto INTEGER  NOT NULL   IDENTITY ,
  Producto VARCHAR    ,
  Precio DOUBLE    ,
  Color VARCHAR    ,
  Tamaño VARCHAR    ,
  Descirpcion TEXT      ,
PRIMARY KEY(idProducto));
GO




CREATE TABLE Publicacion (
  idPublicacion INTEGER  NOT NULL   IDENTITY ,
  Producto_idProducto INTEGER  NOT NULL  ,
  Usuarios_idUsuarios INTEGER  NOT NULL  ,
  idUsuarios INTEGER  NOT NULL  ,
  idProducto INTEGER  NOT NULL  ,
  Fecha DATE  NOT NULL    ,
PRIMARY KEY(idPublicacion, Producto_idProducto)    ,
  FOREIGN KEY(Usuarios_idUsuarios)
    REFERENCES Usuarios(idUsuarios),
  FOREIGN KEY(Producto_idProducto)
    REFERENCES Producto(idProducto));
GO


CREATE INDEX Publicacion_FKIndex1 ON Publicacion (Usuarios_idUsuarios);
GO
CREATE INDEX Publicacion_FKIndex2 ON Publicacion (Producto_idProducto);
GO


CREATE INDEX IFK_crear publicacion ON Publicacion (Usuarios_idUsuarios);
GO
CREATE INDEX IFK_Producto de la publicacion ON Publicacion (Producto_idProducto);
GO


CREATE TABLE Factura (
  idFactura INTEGER  NOT NULL   IDENTITY ,
  Publicacion_Producto_idProducto INTEGER  NOT NULL  ,
  Usuarios_idUsuarios INTEGER  NOT NULL  ,
  Publicacion_idPublicacion INTEGER  NOT NULL  ,
  idUsuarios INTEGER    ,
  idPublicacion INTEGER    ,
  Fecha DATE      ,
PRIMARY KEY(idFactura, Publicacion_Producto_idProducto, Usuarios_idUsuarios, Publicacion_idPublicacion)    ,
  FOREIGN KEY(Publicacion_idPublicacion, Publicacion_Producto_idProducto)
    REFERENCES Publicacion(idPublicacion, Producto_idProducto),
  FOREIGN KEY(Usuarios_idUsuarios)
    REFERENCES Usuarios(idUsuarios));
GO


CREATE INDEX Factura_FKIndex1 ON Factura (Publicacion_idPublicacion, Publicacion_Producto_idProducto);
GO
CREATE INDEX Factura_FKIndex2 ON Factura (Usuarios_idUsuarios);
GO


CREATE INDEX IFK_Publicacion que genro vent ON Factura (Publicacion_idPublicacion, Publicacion_Producto_idProducto);
GO
CREATE INDEX IFK_cliente que compro ON Factura (Usuarios_idUsuarios);
GO



