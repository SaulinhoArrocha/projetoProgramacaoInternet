DROP TABLE IF EXISTS usuarios;

CREATE TABLE IF NOT EXISTS usuarios (
    id              INTEGER PRIMARY KEY,
    nome            TEXT    NOT NULL,
    email           TEXT,
    tipo            INTEGER,
    ativado         INTEGER
);


DROP TABLE IF EXISTS obras;

CREATE TABLE IF NOT EXISTS obras (
    id              INTEGER PRIMARY KEY,
    titulo          TEXT    NOT NULL,
    tipo            TEXT,
    edicao          TEXT,
    valor           INTEGER
);

DROP TABLE IF EXISTS obrasUsuarios;

CREATE TABLE IF NOT EXISTS obrasUsuarios (
    id              INTEGER PRIMARY KEY,
    titulo          TEXT    NOT NULL,
    tipo            TEXT,
    descricao       TEXT,
    valorDesejado   INTEGER
);