import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';


function DataTable(props) {
    const [lyrics, setLyrics] = useState([])
    const [url, setUrl] = useState(props.endpoint)
    const [links, setLinks] = useState([])

    const getLyrics = async () => {
        try {
            let response = await axios.get(url);
            setLyrics(response.data.data);
            setLinks(response.data.meta.links);
        } catch (e){
            console.log(e.message);
        }
    }
    useEffect(() => {
        getLyrics()
    }, [ url ])
    return (
        <div className="card">
            <div className="card-header">
                {props.title}
            </div>
            <div className="card-body">
                <table className="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Band</th>
                            <th>Album</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        {
                            lyrics.map((lyric) => {
                                return (
                                    <tr key={lyric.id}>
                                        <td>{lyric.title}</td>
                                        <td>{lyric.band}</td>
                                        <td>{lyric.album}</td>
                                        <td>Edit</td>
                                    </tr>
                                )
                            })
                        }
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul className="pagination">
                        {
                            links.map((link, index) => {
                                return (
                                    <li className={`page-item ${link.active && 'active'}`} key={index}>
                                        <button onClick={(e) => setUrl(link.url)} className="page-link">{link.label}</button>
                                    </li>
                                )
                            })
                        }
                    </ul>
                </nav>
            </div>
        </div>
    );
}

export default DataTable;

if (document.getElementById('table-of-lyric')) {
    var item = document.getElementById('table-of-lyric')
    ReactDOM.render(<DataTable title={item.getAttribute('title')} endpoint={item.getAttribute('endpoint')} />, item);
}
