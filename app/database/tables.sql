DROP TABLE IF EXISTS usuarios;

CREATE TABLE IF NOT EXISTS usuarios (
    id              INTEGER PRIMARY KEY,
    nome            TEXT    NOT NULL,
    email           TEXT
);

DROP TABLE IF EXISTS tipos;

CREATE TABLE IF NOT EXISTS tipos (
    id              INTEGER PRIMARY KEY,
    tipo            TEXT    NOT NULL
);

INSERT INTO tipos (id, tipo) values (1,'Livro');
INSERT INTO tipos (id, tipo) values (2,'Revista');
INSERT INTO tipos (id, tipo) values (3,'Mangá');

DROP TABLE IF EXISTS obras;

CREATE TABLE IF NOT EXISTS obras (
    id              INTEGER PRIMARY KEY,
    titulo          TEXT    NOT NULL,
    tipo_id         INTEGER,
    edicao          TEXT,
    valor           INTEGER,
    /* definicao de chave estrangeira */
    FOREIGN KEY (  tipo_id)
    REFERENCES tipos (tipo)
);

DROP TABLE IF EXISTS autores;
CREATE TABLE IF NOT EXISTS autores (
    id      INTEGER PRIMARY KEY,
    usuario_id      TEXT    NOT NULL,
    obra_id         TEXT    NOT NULL,
    /* definicao de chave estrangeira */
    FOREIGN KEY (usuario_id)
       REFERENCES usuarios (id),
    FOREIGN KEY (obra_id)
       REFERENCES obras (id)
);


DROP TABLE IF EXISTS obrasUsuarios;

CREATE TABLE IF NOT EXISTS obrasUsuarios (
    id              INTEGER PRIMARY KEY,
    titulo          TEXT    NOT NULL,
    tipo            TEXT,
    descricao       TEXT,
    valorDesejado   INTEGER
);