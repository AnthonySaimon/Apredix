using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Drawing.Drawing2D;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Quiz
{
    public partial class Quiz : Form
    {
        public Quiz()
        {
            InitializeComponent();
        }

        int _pontos=0;
        Button _botaoCorreto;        
        List<Button> _buttons = null;
        int _questaoAtual = 0;
        Thread _threadBotao;

        private void Quiz_Load(object sender, EventArgs e)
        {          
            _buttons = new List<Button>()
            {
                R1,
                R2,
                R3,
                R4
            };
        }


        protected override void OnPaint(PaintEventArgs e)
        {
            GraphicsPath path = new GraphicsPath();
            path.AddEllipse(0, 0, Play.Width, Play.Height);
            Play.Region = new Region(path);
        }



        private void Sair_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }


        private void Play_Click(object sender, EventArgs e)
        {

            R1.Show();
            R2.Show();
            R3.Show();
            R4.Show();
            Play.Hide();
            Sair.Hide();            
            ExibeProximaQuestao();

        }



        private void OpcaoSelecionada(object sender, EventArgs e)
        {
            
                VerificaResposta((Button)sender);
                ExibeProximaQuestao();
                
        }

        private void ExibeProximaQuestao()
        {

            _questaoAtual++;
            if (_questaoAtual == 1)
            {
                CriaQuestao(
                    "O Brasil é de que continente ?",
                    "América do Sul",
                    "Ásia",
                    "América do Norte",
                    "Europa",
                    R1);
            }

            else if (_questaoAtual == 2)
            {
                CriaQuestao(
                    "Qual é mais rápido ?",
                    "Falcão",
                    "Gazela",
                    "Zebra",
                    "Coiote",
                    R4);
            }
            else if (_questaoAtual == 3)
            {
                CriaQuestao(
                    "Como é chamado o medo de sair à rua ?",
                    "Aracnofobia",
                    "Agorafobia",
                    "Apifobia",
                    "Acrofobia",
                    R2);
            }
            else if (_questaoAtual == 4)
            {
                CriaQuestao(
                    "Qual o menor e o maior país do mundo ?",
                    "Vaticano e Rússia",
                    "Nauru e China",
                    "Mônaco e Canadá",
                    "Malta e Estados Unidos",
                    R1);
            }
            else if (_questaoAtual == 5)
            {
                CriaQuestao(
                    "O que a palavra legend significa em português ?",
                    "Lenda",
                    "Conto",
                    "História",
                    "Legenda",
                    R1);
            }
            else if (_questaoAtual == 6)
            {
                CriaQuestao(
                    "O que pesa mais ?",
                    "Uma tonelada de pedras",
                    "Uma tonelada de algodão",
                    "Uma tonelada de ferro",
                    "Nenhum",
                    R4);
            }
            else
            {
                FinalizaJogo();
            }
        }

        private void CriaQuestao(string questao, string alternativa1, string alternativa2, string alternativa3, string alternativa4, Button botaoCorreto)
        {
            lblQuestoes.Text = questao;
            R1.Text = alternativa1;
            R2.Text = alternativa2;
            R3.Text = alternativa3;
            R4.Text = alternativa4;
            _botaoCorreto = botaoCorreto;
        }

        private bool VerificaBotaoCorreto(Button botao)
        {
            return botao == _botaoCorreto;
        }

        private void VerificaResposta(Button button)
        {
            if (VerificaBotaoCorreto(button))
            {
                _pontos++;
            }

            foreach (var item in _buttons)
            {
                Color cor = Color.Red;                

                if (VerificaBotaoCorreto(item))
                {
                    cor = Color.Green;
                }

                item.BackColor = cor;
                item.FlatAppearance.BorderColor = cor;
            }

            this.Update();
           

            Thread.Sleep(1000);
        
          
            foreach (var item in _buttons)
            {
                item.BackColor = Color.Blue;
                item.FlatAppearance.BorderColor = Color.DarkBlue;
            }


        }
        

        private void FinalizaJogo()
        {
            foreach (var item in _buttons)
            {
                lblQuestoes.Text = "Você acertou " + _pontos + (_pontos == 1 ? " questão" : " questões");
                lblQuestoes.ForeColor = Color.Black;
                item.Hide();  
                Sair.Show();
            }
           
        }
    }
}
