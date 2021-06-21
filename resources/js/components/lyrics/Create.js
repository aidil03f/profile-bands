import axios from 'axios';
import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';


function Create(props) {
    const [message, setMessage] = useState('')
    const [bands, setBands] = useState([])
    const [albums, setAlbums] = useState([])
    const [bandId, setBandId] = useState('')
    const [albumId, setAlbumId] = useState('')
    const [title, setTitle] = useState('')
    const [body, setBody] = useState('')

    const request = {
        band: bandId,
        album: albumId,
        title,
        body,
    }


    const getBands = async () => {
        let response = await axios.get('/bands/table')
        setBands(response.data);
    }
    const getAlbumBySelectedBand = async (e) => {
        setBandId(e.target.value)
        let response = await axios.get(`/albums/get-album-by-${e.target.value}`)
        setAlbums(response.data);
    }
    const store = async (e) => {
        e.preventDefault();
        try {
            let response = await axios.post(props.endpoint, request)
            setMessage(response.data.message);
        } catch (e) {
            console.log(e.message);
        }
    }

    useEffect(() => {
        getBands()
    }, [])
    return (
        <div>
            {message && <div className="alert alert-success" role="alert">{message}</div>}
            <div className="card">
                <div className="card-header">{props.title}</div>
                <div className="card-body">
                    <form onSubmit={store}>
                        <div className="form-group">
                            <label htmlFor="band">Band</label>
                            <select onChange={getAlbumBySelectedBand} name="band" id="band" className="form-control">
                                <option value={null}>Choose a band</option>
                                {
                                    bands.map((band) => {
                                        return <option key={band.id} value={band.id}>{band.name}</option>
                                    })
                                }
                            </select>
                        </div>
                        {
                            albums.length ?
                            <div className="form-group">
                                <label htmlFor="album">Album</label>
                                <select onChange={(e) => setAlbumId(e.target.value)} name="album" id="album" className="form-control">
                                    <option value={null}>Choose a album</option>
                                    {
                                        albums.map((album) => {
                                            return <option key={album.id} value={album.id}>{album.name}</option>
                                        })
                                    }
                                </select>
                            </div> : ''
                        }
                        <div className="form-group">
                            <label htmlFor="title">Title</label>
                            <input type="text" value={title} onChange={(e) => setTitle(e.target.value)} name="title" id="title" className="form-control"/>
                        </div>
                        <div className="form-group">
                            <label htmlFor="body">Lyric</label>
                            <textarea value={body} onChange={(e) => setBody(e.target.value)} rows="10" name="body" id="body" className="form-control"/>
                        </div>
                        <button type="submit" className="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    );
}

export default Create;

if (document.getElementById('create-lyric')) {
    var item = document.getElementById('create-lyric')
    ReactDOM.render(<Create title={item.getAttribute('title')} endpoint={item.getAttribute('endpoint')} />, item);
}
