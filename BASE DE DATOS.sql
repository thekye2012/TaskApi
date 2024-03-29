USE [tareas]
GO
/****** Object:  User [local]    Script Date: 04/01/2024 04:24:58 p. m. ******/
CREATE USER [local] FOR LOGIN [local] WITH DEFAULT_SCHEMA=[local]
GO
/****** Object:  Table [dbo].[tareas]    Script Date: 04/01/2024 04:24:58 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tareas](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_user] [int] NOT NULL,
	[titulo] [nvarchar](300) NOT NULL,
	[descripcion] [nvarchar](max) NOT NULL,
	[prioridad] [int] NULL,
	[fecha_limite] [datetime] NULL,
	[estado] [nvarchar](50) NULL,
	[duracion_estimada] [int] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[deleted_at] [datetime] NULL,
 CONSTRAINT [PK_tareas] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 04/01/2024 04:24:58 p. m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[username] [nvarchar](120) NOT NULL,
	[password] [nvarchar](500) NOT NULL,
	[email] [nvarchar](300) NOT NULL,
 CONSTRAINT [PK_users] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[tareas] ADD  CONSTRAINT [DF_tareas_estado]  DEFAULT (N'Incompleta') FOR [estado]
GO
ALTER TABLE [dbo].[tareas] ADD  CONSTRAINT [DF_tareas_duracion_estimada]  DEFAULT ((0)) FOR [duracion_estimada]
GO
ALTER TABLE [dbo].[tareas] ADD  CONSTRAINT [DF_tareas_created_at]  DEFAULT (getdate()) FOR [created_at]
GO
ALTER TABLE [dbo].[tareas]  WITH CHECK ADD  CONSTRAINT [FK_tareas_user] FOREIGN KEY([id_user])
REFERENCES [dbo].[users] ([id])
GO
ALTER TABLE [dbo].[tareas] CHECK CONSTRAINT [FK_tareas_user]
GO
