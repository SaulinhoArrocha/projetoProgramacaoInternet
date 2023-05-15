DROP TABLE IF EXISTS usuarios;

CREATE TABLE IF NOT EXISTS usuarios (
    id              INTEGER PRIMARY KEY,
    nome            TEXT    NOT NULL,
    dataNascimento  TEXT,
    tipo            INTEGER,
    ativado         INTEGER
);

INSERT INTO usuarios (id, nome, dataNascimento, tipo, ativado) values (1,'teste 1','01-01-2000',1,1);
INSERT INTO usuarios (id, nome, dataNascimento, tipo, ativado) values (2,'teste 2','01-01-2001',1,1);
INSERT INTO usuarios (id, nome, dataNascimento, tipo, ativado) values (3,'teste 3','01-01-2003',1,1);


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