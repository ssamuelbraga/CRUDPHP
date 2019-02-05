
import { Injectable } from '@angular/core';
import { SQLite, SQLiteObject } from '@ionic-native/sqlite';



@Injectable()
export class DatabaseProvider {

  constructor(private sqlite: SQLite) {
   
  }

  public getDB() {
    return this.sqlite.create({
      name: 'produtosbd.db',
      location: 'default'
    });
  }



public criarDatabase() {
    return this.getDB()
      .then((db: SQLiteObject) => {
 
        // Criando as tabelas
        this.criarTabelas(db);
 
        //ALIMENTANDO CATEGORIAS
        this.inserirDados(db);
       
      })
      .catch(e => console.log(e));
  }



private criarTabelas(db: SQLiteObject) {
    // Criando as tabelas
    db.sqlBatch([
      ['CREATE TABLE IF NOT EXISTS categoria(id integer primary key AUTOINCREMENT NOT NULL, nome TEXT)'],
      ['CREATE TABLE IF NOT EXISTS produto (id integer primary key AUTOINCREMENT NOT NULL, nome TEXT, preco REAL, data DATE, ativo integer, categoria_id integer, FOREIGN KEY(categoria_id) REFERENCES categoria(id))']
    ])
    .then(() => console.log('Tabelas criadas'))
    .catch(e => console.error('Erro ao criar as tabelas', e));
  }


  private inserirDados(db: SQLiteObject){
    db.executeSql('select COUNT(id) as qtd from categoria', {})
    .then((data: any)=> {
      //SE NÃO HOUVER REGISTROS
      if(data.rows.item(0).qtd == 0){
        //inserindo dados
        db.sqlBatch([
          ['insert into categoria (nome) values (?)', ['Limpeza']],
          ['insert into categoria (nome) values (?)', ['Bebidas']],
          ['insert into categoria (nome) values (?)', ['Congelados']]
        ])

        .then(() => console.log('Dados incluidos'))
        .catch(e => console.error('Erro ao inserir dados', e));
      }
        })

        .catch(e => console.error('Erro ao consultar dados!', e));
  }

}
