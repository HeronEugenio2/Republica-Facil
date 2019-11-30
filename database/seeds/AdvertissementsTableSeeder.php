<?php

use App\Models\Advertisement;
use Illuminate\Database\Seeder;

class AdvertissementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Advertisement::create([
                                  "description" => "Vendo TV Full HD 32 LG - Televisão com giratória funcionando perfeitamente!!!",
                                  "image" => "https://img.olx.com.br/images/99/993930097420922.jpg	",
                                  "title" => "Televisão Full HD 32 LG",
                                  "value" => 500,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 3,
                                  "active_flag" => 1,

                              ]);
        Advertisement::create([
                                  "description" => "Angelim em ótimo estado de conservação,",
                                  "image" => "https://img.olx.com.br/images/99/998930098189315.jpg",
                                  "title" => "Vendo este rack	120	36016-000",
                                  "value" => 500,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 3,
                                  "active_flag" => 1,
                              ]);
        Advertisement::create([
                                  "description" => "Casa Sobreposta/ Inocoop II2 dormitórios, sala, cozinha, wc e lavanderia.1 Vaga descoberta.Próximo á escola, posto de saúde, transporte publico, comércio em geral.Valor e disponibilidade sujeitos a alterações.",
                                  "image" => "https://http2.mlstatic.com/casa-residencial-venda-jardim-presidente-dutra-guarulhos-D_NQ_NP_882511-MLB27184757999_042018-F.webp",
                                  "title" => "Jardim Presidente Dutra, Guarulhos",
                                  "value" => 800,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 1,
                                  "active_flag" => 1,

                              ]);
        Advertisement::create([
                                  "description" => "Ótima localização.",
                                  "image" => "https://http2.mlstatic.com/alugo-casa-cond-2-suites-araruama-rjo-com-piscina-diaria-D_NQ_NP_174601-MLB20363308909_072015-F.webp",
                                  "title" => "Matias Bussinger 1, Araruama",
                                  "value" => 500,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 1,
                                  "active_flag" => 1,
                              ]);
        Advertisement::create([
                                  "description" => "Imóvel com entrada separada, frente, em excelente localização, em frente ao Hospital da Mulher, vários comércios, fácil acesso a transporte público, constituído por 2 dormitórios, sala, cozinha, wc, lavanderia, vaga para 1 auto.",
                                  "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTiPJJ7mDdpmYIGULiksHz_27RrrxMdi7b_rdtM2q24XubTLC4K",
                                  "title" => "R América Do Sul, Parque Novo Oratório, Santo André",
                                  "value" => 1050,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 1,
                                  "active_flag" => 1,
                              ]);
        Advertisement::create([
                                  "description" => "linda casa com 1 dormitório, sala, cozinha e banheiro água e luz separados, quintal separado locação com fiador ou seguro fiança.",
                                  "image" => "https://http2.mlstatic.com/casa-de-vila-em-jardim-paulista-guarulhos-756-D_NQ_NP_848582-MLB33021997249_112019-F.webp",
                                  "title" => "Jardim Paulista, Guarulhos",
                                  "value" => 610,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 1,
                                  "active_flag" => 1,
                              ]);
        Advertisement::create([
                                  "description" => "Excelente casa mobiliada com 3 dormitório sendo 1 suíte, todos já com armários (2 com camas e com ar condicionado), banheiros com box em vidro e gabinete, escritório montado, linda cozinha planejada, área de serviço com fechamento de vidro, varanda gourmet com toldo como fechamento, 2 vagas de garagem cobertas. Casa diferenciada dentro do condomínio.
Espaço de lazer com piscina adulto e infantil, quadra de esportes, playground, churrasqueira, praça de convivência e salão de festas mobiliado. Portaria 24 horas.",
                                  "image" => "https://http2.mlstatic.com/casa-com-3-dormitorios-para-alugar-100-m-por-r-210000ms-vila-do-golf-ribeiro-pretosp-ca1245-D_NQ_NP_680668-MLB33009392482_112019-F.webp",
                                  "title" => "Bonfim Paulista",
                                  "value" => 2000,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 1,
                                  "active_flag" => 1,
                              ]);
        Advertisement::create([
                                  "description" => "CASA TERREA- JD VERA CRUZ- SBC Ref. 35115 1.600,00 EXCELENTE CASA TÉRREA PARA LOCAÇÃO.",
                                  "image" => "https://http2.mlstatic.com/locaco-casa-terrea-sao-bernardo-do-campo-jardim-vera-cruz-r-1033-2-35115-D_NQ_NP_837821-MLB33004591006_112019-F.webp",
                                  "title" => "Antonio Carlos De Lima, R, Independência, São Bernardo Do Campo",
                                  "value" => 900,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 1,
                                  "active_flag" => 1,
                              ]);
        Advertisement::create([
                                  "description" => "Armário multiuso com prateleiras ótimo para cozinha lavanderia quarto sapateira",
                                  "image" => "https://images.madeiramadeira.com.br/product/images/25930291-comoda-7-gavetas-grecia-ej-moveis-7898963567592-1_zoom-1500x1500.jpg",
                                  "title" => "Cômoda 7 Gavetas 2 Portas Com Rodízios London",
                                  "value" => 380,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 3,
                                  "active_flag" => 1,
                              ]);
        Advertisement::create([
                                  "description" => "Uma casa comercial para locação onde já funcionou um salão; Ela possui uma suíte nos fundos, são mais 5 salas e 2 banhos; Local ideal para salões, clínicas, consultórios; Mais informações entre em contato.",
                                  "image" => "https://http2.mlstatic.com/casa-comercial-para-salo-clinicas-3767-D_NQ_NP_762730-MLB33013209050_112019-F.webp",
                                  "title" => "Santa Rosa, Belo Horizonte",
                                  "value" => 2200,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 1,
                                  "active_flag" => 1,
                              ]);
        Advertisement::create([
                                  "description" => "O(a) CÔMODA 5 GAVETAS 1 PORTA CP15D DEMOLIÇÃO - EVIDÊNCIA MÓVEIS é produzido em MDP.
O produto necessita de montagem, chegará na sua casa desmontado, em caixas, acompanhado de todas as peças, ferragens e manuais para montagem, ele é montado com Parafusos, cavilhas e minifix, e a sua montagem possui um grau de dificuldade Médio para ser efetuada.
Este móvel é indicado para que seja utilizado em Quarto, dando um toque especial no cômodo de sua casa.
Para que você mantenha seu produto sempre em ótimo estado, recomendasse Limpar com pano seco ou levemente umedecido.
Lembrando ainda que: Objetos decorativos que aparacem na imagem, não acompanham o produto.",
                                  "image" => "https://http2.mlstatic.com/cmoda-5-gavetas-1-porta-cp15d-demolico-D_NQ_NP_914238-MLB31783159832_082019-F.webp",
                                  "title" => "Cômoda 5 Gavetas 1 Porta Cp15d Demolição",
                                  "value" => 169,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 3,
                                  "active_flag" => 1,
                              ]);
        Advertisement::create([
                                  "description" => "Cozinhe diferente com a função de spiedo você obterá carnes douradas por fora e suculentas por dentro. Grelhe frango, carne, porco ou peru no ponto certo com muita facilidade.",
                                  "image" => "https://http2.mlstatic.com/D_NQ_NP_2X_946467-MLA32706344212_102019-F.webp",
                                  "title" => "Forno elétrico Best Forno 60 L Plus Preto/Branco 110V",
                                  "value" => 459,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 3,
                                  "active_flag" => 1,
                              ]);
        Advertisement::create([
                                  "description" => "Desenho elegante, quando embutido, este forno dará à sua cozinha um estilo sofisticado e lhe permitirá economizar espaço. Sua ampla capacidade moderada faz deste forno seu melhor aliado para entreter aos invitados. Esforce-se na cozinha com pratos originais e deliciosos!",
                                  "image" => "https://a-static.mlcdn.com.br/618x463/forno-eletrico-de-embutir-philco-46-litros-multifuncoes-2-resistencias/efacil/191808-16/f2b3df980dfcc23976e455ba30e9701a.jpg",
                                  "title" => "Forno elétrico Electrolux OE8M Aço inoxidável 220V",
                                  "value" => 1405,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 3,
                                  "active_flag" => 1,
                              ]);
        Advertisement::create([
                                  "description" => "Espaços pequenos, cozimento ideal com este forno de mesa, você desfrutará dos mesmos benefícios que um forno convencional, com a vantagem de poder instalá-lo onde você quiser",
                                  "image" => "https://img.olx.com.br/images/99/991930091802174.jpg",
                                  "title" => "Armário multiuso - entregamos",
                                  "value" => 500,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 3,
                                  "active_flag" => 1,
                              ]);
        Advertisement::create([
                                  "description" => "Armário multiuso com prateleiras ótimo para cozinha lavanderia quarto sapateira",
                                  "image" => "https://http2.mlstatic.com/D_NQ_NP_2X_901984-MLA32707529146_102019-F.webp",
                                  "title" => "Forno elétrico Amvox AFR 3800 Preto 110V",
                                  "value" => 136,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 3,
                                  "active_flag" => 1,
                              ]);
        Advertisement::create([
                                  "description" => "Armário multiuso com prateleiras ótimo para cozinha lavanderia quarto sapateira",
                                  "image" => "https://img.olx.com.br/images/99/991930091802174.jpg",
                                  "title" => "Armário multiuso - entregamos",
                                  "value" => 500,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 3,
                                  "active_flag" => 1,
                              ]);
        Advertisement::create([
                                  "description" => "Armário multiuso com prateleiras ótimo para cozinha lavanderia quarto sapateira",
                                  "image" => "https://http2.mlstatic.com/vende-geladeira-electrolux-df80x-seminova-D_NQ_NP_787230-MLB31204074285_062019-F.webp",
                                  "title" => "Geladeira Electrolux df80x seminova",
                                  "value" => 1600,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 3,
                                  "active_flag" => 1,
                              ]);
        Advertisement::create([
                                  "description" => "Geladeira duas portas LG ótimo estado",
                                  "image" => "https://http2.mlstatic.com/geladeira-duas-portas-lg-com-dispenser-D_NQ_NP_873894-MLB31022939740_062019-F.webp",
                                  "title" => "Geladeira Duas Portas Lg Com Dispenser",
                                  "value" => 1600,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 3,
                                  "active_flag" => 1,
                              ]);
        Advertisement::create([
                                  "description" => "Armário multiuso com prateleiras ótimo para cozinha lavanderia quarto sapateira",
                                  "image" => "https://img.olx.com.br/images/99/991930091802174.jpg",
                                  "title" => "Armário multiuso - entregamos",
                                  "value" => 500,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 3,
                                  "active_flag" => 1,
                              ]);
        Advertisement::create([
                                  "description" => "2 anos de uso. Perfeito estado. Pode ser usado como geladeira ou como freezer.",
                                  "image" => "https://http2.mlstatic.com/geladeirafreezer-dupla-aco-gelopar-110v-D_NQ_NP_988909-MLB31831932235_082019-F.webp",
                                  "title" => "Geladeira/freezer Dupla Ação Gelopar 110v",
                                  "value" => 1100,
                                  "cep" => '36016000',
                                  "address" => 'Centro',
                                  "street" => 'Rua Halfeld',
                                  "city" => 'Juiz de Fora',
                                  "state" => 'Minas Gerais',
                                  "user_id" => 1,
                                  "category_id" => 3,
                                  "active_flag" => 1,
                              ]);
    }
}
