namespace Quiz
{
    partial class Quiz
    {
        /// <summary>
        /// Variável de designer necessária.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Limpar os recursos que estão sendo usados.
        /// </summary>
        /// <param name="disposing">true se for necessário descartar os recursos gerenciados; caso contrário, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Código gerado pelo Windows Form Designer

        /// <summary>
        /// Método necessário para suporte ao Designer - não modifique 
        /// o conteúdo deste método com o editor de código.
        /// </summary>
        private void InitializeComponent()
        {
            this.Play = new System.Windows.Forms.Button();
            this.Sair = new System.Windows.Forms.Button();
            this.R1 = new System.Windows.Forms.Button();
            this.R3 = new System.Windows.Forms.Button();
            this.R4 = new System.Windows.Forms.Button();
            this.R2 = new System.Windows.Forms.Button();
            this.lblQuestoes = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // Play
            // 
            this.Play.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.Play.BackColor = System.Drawing.Color.Transparent;
            this.Play.FlatAppearance.BorderSize = 0;
            this.Play.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.Play.Font = new System.Drawing.Font("Microsoft Sans Serif", 26.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Play.Location = new System.Drawing.Point(320, 152);
            this.Play.Name = "Play";
            this.Play.Size = new System.Drawing.Size(150, 150);
            this.Play.TabIndex = 0;
            this.Play.TabStop = false;
            this.Play.Text = "Jogar Quiz";
            this.Play.UseVisualStyleBackColor = false;
            this.Play.Click += new System.EventHandler(this.Play_Click);
            // 
            // Sair
            // 
            this.Sair.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Bottom | System.Windows.Forms.AnchorStyles.Right)));
            this.Sair.BackColor = System.Drawing.Color.Red;
            this.Sair.FlatAppearance.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(192)))), ((int)(((byte)(0)))), ((int)(((byte)(0)))));
            this.Sair.FlatAppearance.BorderSize = 2;
            this.Sair.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.Sair.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Sair.ForeColor = System.Drawing.Color.White;
            this.Sair.Location = new System.Drawing.Point(637, 359);
            this.Sair.Name = "Sair";
            this.Sair.Size = new System.Drawing.Size(101, 50);
            this.Sair.TabIndex = 1;
            this.Sair.Text = "Sair";
            this.Sair.UseVisualStyleBackColor = false;
            this.Sair.Click += new System.EventHandler(this.Sair_Click);
            // 
            // R1
            // 
            this.R1.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.R1.BackColor = System.Drawing.Color.Blue;
            this.R1.FlatAppearance.BorderColor = System.Drawing.Color.DarkBlue;
            this.R1.FlatAppearance.BorderSize = 2;
            this.R1.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.R1.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.R1.ForeColor = System.Drawing.Color.White;
            this.R1.Location = new System.Drawing.Point(90, 199);
            this.R1.Name = "R1";
            this.R1.Size = new System.Drawing.Size(219, 70);
            this.R1.TabIndex = 2;
            this.R1.Text = "Resposta 1";
            this.R1.UseVisualStyleBackColor = false;
            this.R1.Visible = false;
            this.R1.Click += new System.EventHandler(this.OpcaoSelecionada);
            // 
            // R3
            // 
            this.R3.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.R3.BackColor = System.Drawing.Color.Blue;
            this.R3.FlatAppearance.BorderColor = System.Drawing.Color.DarkBlue;
            this.R3.FlatAppearance.BorderSize = 2;
            this.R3.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.R3.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.R3.ForeColor = System.Drawing.Color.White;
            this.R3.Location = new System.Drawing.Point(90, 339);
            this.R3.Name = "R3";
            this.R3.Size = new System.Drawing.Size(219, 70);
            this.R3.TabIndex = 3;
            this.R3.Text = "Resposta 3";
            this.R3.UseVisualStyleBackColor = false;
            this.R3.Visible = false;
            this.R3.Click += new System.EventHandler(this.OpcaoSelecionada);
            // 
            // R4
            // 
            this.R4.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.R4.BackColor = System.Drawing.Color.Blue;
            this.R4.FlatAppearance.BorderColor = System.Drawing.Color.DarkBlue;
            this.R4.FlatAppearance.BorderSize = 2;
            this.R4.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.R4.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.R4.ForeColor = System.Drawing.Color.White;
            this.R4.Location = new System.Drawing.Point(476, 199);
            this.R4.Name = "R4";
            this.R4.Size = new System.Drawing.Size(219, 70);
            this.R4.TabIndex = 4;
            this.R4.Text = "Resposta 4";
            this.R4.UseVisualStyleBackColor = false;
            this.R4.Visible = false;
            this.R4.Click += new System.EventHandler(this.OpcaoSelecionada);
            // 
            // R2
            // 
            this.R2.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.R2.BackColor = System.Drawing.Color.Blue;
            this.R2.FlatAppearance.BorderColor = System.Drawing.Color.DarkBlue;
            this.R2.FlatAppearance.BorderSize = 2;
            this.R2.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.R2.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.R2.ForeColor = System.Drawing.Color.White;
            this.R2.Location = new System.Drawing.Point(476, 339);
            this.R2.Name = "R2";
            this.R2.Size = new System.Drawing.Size(219, 70);
            this.R2.TabIndex = 5;
            this.R2.Text = "Resposta 2";
            this.R2.UseVisualStyleBackColor = false;
            this.R2.Visible = false;
            this.R2.Click += new System.EventHandler(this.OpcaoSelecionada);
            // 
            // lblQuestoes
            // 
            this.lblQuestoes.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.lblQuestoes.AutoSize = true;
            this.lblQuestoes.Font = new System.Drawing.Font("Microsoft Sans Serif", 18F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblQuestoes.ForeColor = System.Drawing.Color.White;
            this.lblQuestoes.Location = new System.Drawing.Point(85, 41);
            this.lblQuestoes.Name = "lblQuestoes";
            this.lblQuestoes.Size = new System.Drawing.Size(175, 29);
            this.lblQuestoes.TabIndex = 6;
            this.lblQuestoes.Text = "Resolva o Quiz";
            // 
            // Quiz
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.SystemColors.AppWorkspace;
            this.ClientSize = new System.Drawing.Size(800, 450);
            this.Controls.Add(this.lblQuestoes);
            this.Controls.Add(this.R2);
            this.Controls.Add(this.R4);
            this.Controls.Add(this.R3);
            this.Controls.Add(this.R1);
            this.Controls.Add(this.Sair);
            this.Controls.Add(this.Play);
            this.Name = "Quiz";
            this.Text = "Quiz";
            this.Load += new System.EventHandler(this.Quiz_Load);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button Play;
        private System.Windows.Forms.Button Sair;
        private System.Windows.Forms.Button R1;
        private System.Windows.Forms.Button R3;
        private System.Windows.Forms.Button R4;
        private System.Windows.Forms.Button R2;
        private System.Windows.Forms.Label lblQuestoes;
    }
}

