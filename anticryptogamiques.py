import discord
from discord import message
import discord.ext
from discord import app_commands
intents = discord.Intents.all()
client = discord.Client(intents=intents)
tree = discord.app_commands.CommandTree(client)



@client.event
async def on_ready():
    await tree.sync()
    print("ready")


@tree.command(name="code")
@app_commands.describe(code="entrer le code")
async def slashing_commanding(int: discord.Interaction, code:str):
    await int.response.send_message("code validé")
# @tree.command(name="decrypt", description="decrypt message in morse code",)
# @app_commands.describe(text_to_decrypt="enter text to decrypt")
# async def slashing_commanding(int: discord.Interaction, text_to_decrypt:str):
#     await int.response.send_message(decrypt(text_to_decrypt+str(" ")).lower())

client.run("MTA0ODAxOTA5NjI5OTYzODc4Ng.GlGn66.vn1j8eHe6R2uybi6THdOocakp7jnI6bQkKtB7s")
